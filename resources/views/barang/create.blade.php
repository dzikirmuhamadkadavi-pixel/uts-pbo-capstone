@extends('layouts.app')

@section('title', 'Tambah Barang')
@section('heading', 'Tambah Data Barang')

@section('content')
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" value="{{ old('kode') }}" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" min="0" value="{{ old('jumlah', 0) }}" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi" required>
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik" {{ old('kondisi') === 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi') === 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi') === 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-info">Kembali</a>
        </div>
    </form>
@endsection