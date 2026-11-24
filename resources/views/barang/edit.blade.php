@extends('layouts.app')

@section('title', 'Edit Barang')
@section('heading', 'Edit Data Barang')

@section('content')
    <form action="{{ route('barang.update', $item['kode']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" value="{{ $item['kode'] }}" disabled>
        </div>

        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $item['nama']) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $item['kategori']) }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $item['lokasi']) }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" min="0" value="{{ old('jumlah', $item['jumlah']) }}" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi" required>
                <option value="Baik" {{ old('kondisi', $item['kondisi']) === 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi', $item['kondisi']) === 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi', $item['kondisi']) === 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-warning">Perbarui</button>
            <a href="{{ route('barang.index') }}" class="btn btn-info">Kembali</a>
        </div>
    </form>
@endsection