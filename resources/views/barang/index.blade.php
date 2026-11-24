@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('heading', 'Daftar Data Barang')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Data Tersimpan</h2>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    @if (count($items) > 0)
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['lokasi'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['kondisi'] }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('barang.show', $item['kode']) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('barang.edit', $item['kode']) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('barang.destroy', $item['kode']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data dengan kode {{ $item['kode'] }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 16px;">Belum ada data yang tersimpan di session. Silakan klik <strong>+ Tambah Data</strong> untuk menambahkan data baru.</p>
    @endif
@endsection