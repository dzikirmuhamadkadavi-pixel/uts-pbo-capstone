@extends('layouts.app')

@section('title', 'Detail Barang')
@section('heading', 'Detail Data Barang')

@section('content')
    <table>
        <tr>
            <th style="width: 220px;">Kode</th>
            <td>{{ $item['kode'] }}</td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td>{{ $item['nama'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $item['kategori'] }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $item['lokasi'] }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $item['jumlah'] }}</td>
        </tr>
        <tr>
            <th>Kondisi</th>
            <td>{{ $item['kondisi'] }}</td>
        </tr>
    </table>

    <div class="actions" style="margin-top: 16px;">
        <a href="{{ route('barang.edit', $item['kode']) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('barang.index') }}" class="btn btn-info">Kembali ke Daftar</a>
        <form action="{{ route('barang.destroy', $item['kode']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data dengan kode {{ $item['kode'] }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection