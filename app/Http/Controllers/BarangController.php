<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    private const SESSION_KEY = 'barang_data';

    public function index(Request $request): View
    {
        $items = $this->getItemsFromSession($request);

        return view('barang.index', [
            'items' => $items,
        ]);
    }

    public function create(): View
    {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode'     => ['required', 'string', 'max:30'],
            'nama'     => ['required', 'string', 'max:120'],
            'kategori' => ['required', 'string', 'max:80'],
            'lokasi'   => ['required', 'string', 'max:100'],
            'jumlah'   => ['required', 'integer', 'min:0'],
            'kondisi'  => ['required', 'string', 'in:Baik,Rusak Ringan,Rusak Berat'],
        ]);

        $kode = trim($validated['kode']);
        $items = $this->getItemsFromSession($request);

        if (isset($items[$kode])) {
            return redirect()
                ->route('barang.create')
                ->withInput()
                ->with('error', "Data dengan kode '{$kode}' sudah terdaftar.");
        }

        $items[$kode] = [
            'kode'     => $kode,
            'nama'     => trim($validated['nama']),
            'kategori' => trim($validated['kategori']),
            'lokasi'   => trim($validated['lokasi']),
            'jumlah'   => (int) $validated['jumlah'],
            'kondisi'  => $validated['kondisi'],
        ];

        $request->session()->put(self::SESSION_KEY, $items);

        return redirect()
            ->route('barang.index')
            ->with('success', "Data barang '{$kode}' berhasil ditambahkan.");
    }

    public function show(Request $request, string $kode): View|RedirectResponse
    {
        $items = $this->getItemsFromSession($request);

        if (!isset($items[$kode])) {
            return redirect()
                ->route('barang.index')
                ->with('error', "Data dengan kode '{$kode}' tidak ditemukan.");
        }

        return view('barang.show', [
            'item' => $items[$kode],
        ]);
    }

    public function edit(Request $request, string $kode): View|RedirectResponse
    {
        $items = $this->getItemsFromSession($request);

        if (!isset($items[$kode])) {
            return redirect()
                ->route('barang.index')
                ->with('error', "Data dengan kode '{$kode}' tidak ditemukan untuk diedit.");
        }

        return view('barang.edit', [
            'item' => $items[$kode],
        ]);
    }

    public function update(Request $request, string $kode): RedirectResponse
    {
        $items = $this->getItemsFromSession($request);

        if (!isset($items[$kode])) {
            return redirect()
                ->route('barang.index')
                ->with('error', "Data dengan kode '{$kode}' tidak ditemukan untuk diperbarui.");
        }

        $validated = $request->validate([
            'nama'     => ['required', 'string', 'max:120'],
            'kategori' => ['required', 'string', 'max:80'],
            'lokasi'   => ['required', 'string', 'max:100'],
            'jumlah'   => ['required', 'integer', 'min:0'],
            'kondisi'  => ['required', 'string', 'in:Baik,Rusak Ringan,Rusak Berat'],
        ]);

        $items[$kode] = [
            'kode'     => $kode,
            'nama'     => trim($validated['nama']),
            'kategori' => trim($validated['kategori']),
            'lokasi'   => trim($validated['lokasi']),
            'jumlah'   => (int) $validated['jumlah'],
            'kondisi'  => $validated['kondisi'],
        ];

        $request->session()->put(self::SESSION_KEY, $items);

        return redirect()
            ->route('barang.index')
            ->with('success', "Data barang '{$kode}' berhasil diperbarui.");
    }

    public function destroy(Request $request, string $kode): RedirectResponse
    {
        $items = $this->getItemsFromSession($request);

        if (!isset($items[$kode])) {
            return redirect()
                ->route('barang.index')
                ->with('error', "Data dengan kode '{$kode}' tidak ditemukan atau sudah dihapus.");
        }

        unset($items[$kode]);
        $request->session()->put(self::SESSION_KEY, $items);

        return redirect()
            ->route('barang.index')
            ->with('success', "Data barang '{$kode}' berhasil dihapus.");
    }

    private function getItemsFromSession(Request $request): array
    {
        $data = $request->session()->get(self::SESSION_KEY, []);

        return is_array($data) ? $data : [];
    }
}