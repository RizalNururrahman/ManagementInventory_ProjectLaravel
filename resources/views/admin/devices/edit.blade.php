@extends('layouts.app')

@section('title', 'Edit Perangkat')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Edit Perangkat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.devices.update', $device->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control" required value="{{ old('serial_number', $device->serial_number) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Merk</label>
            <input type="text" name="merk" class="form-control" required value="{{ old('merk', $device->merk) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Metode Pembelian</label>
            <select name="metode_pembelian" class="form-control" required>
                <option value="Pengadaan Terbuka" {{ $device->metode_pembelian == 'Pengadaan Terbuka' ? 'selected' : '' }}>Pengadaan Terbuka</option>
                <option value="Penunjukkan Langsung" {{ $device->metode_pembelian == 'Penunjukkan Langsung' ? 'selected' : '' }}>Penunjukkan Langsung</option>
                <option value="Pengadaan Terbatas" {{ $device->metode_pembelian == 'Pengadaan Terbatas' ? 'selected' : '' }}>Pengadaan Terbatas</option>
                <option value="Uang Muka" {{ $device->metode_pembelian == 'Uang Muka' ? 'selected' : '' }}>Uang Muka</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input type="number" name="quantity" class="form-control" min="1" required value="{{ old('quantity', $device->quantity) }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.devices.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
