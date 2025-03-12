@extends('layouts.app')

@section('title', 'Edit Pengiriman')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Edit Pengiriman</h2>

    <form action="{{ route('admin.pengiriman.update', $pengiriman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pilih Perangkat</label>
            <select name="device_id" class="form-control" required>
                @foreach($devices as $device)
                    <option value="{{ $device->id }}" {{ $pengiriman->device_id == $device->id ? 'selected' : '' }}>
                        {{ $device->merk }} - {{ $device->serial_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Penerima</label>
            <input type="text" name="user_name" class="form-control" value="{{ $pengiriman->user_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <input type="text" name="divisi" class="form-control" value="{{ $pengiriman->divisi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Kapal</label>
            <input type="text" name="kapal" class="form-control" value="{{ $pengiriman->kapal }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Cabang</label>
            <input type="text" name="cabang" class="form-control" value="{{ $pengiriman->cabang }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status Pengiriman</label>
            <select name="status_pengiriman" class="form-control" required>
                <option value="Dikirim" {{ $pengiriman->status_pengiriman == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                <option value="Diterima" {{ $pengiriman->status_pengiriman == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Selesai" {{ $pengiriman->status_pengiriman == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.pengiriman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
