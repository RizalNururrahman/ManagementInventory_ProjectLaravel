@extends('layouts.app')

@section('title', 'Tambah Perangkat')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Tambah Perangkat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.devices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control" required value="{{ old('serial_number') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Merk</label>
            <input type="text" name="merk" class="form-control" required value="{{ old('merk') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Metode Pembelian</label>
            <select name="metode_pembelian" class="form-control" required>
                <option value="">-- Pilih Metode Pembelian --</option>
                <option value="Pengadaan Terbuka" {{ old('metode_pembelian') == 'Pengadaan Terbuka' ? 'selected' : '' }}>Pengadaan Terbuka</option>
                <option value="Penunjukkan Langsung" {{ old('metode_pembelian') == 'Penunjukkan Langsung' ? 'selected' : '' }}>Penunjukkan Langsung</option>
                <option value="Pengadaan Terbatas" {{ old('metode_pembelian') == 'Pengadaan Terbatas' ? 'selected' : '' }}>Pengadaan Terbatas</option>
                <option value="Uang Muka" {{ old('metode_pembelian') == 'Uang Muka' ? 'selected' : '' }}>Uang Muka</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input type="number" name="quantity" class="form-control" min="1" required value="{{ old('quantity') }}">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.devices.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
