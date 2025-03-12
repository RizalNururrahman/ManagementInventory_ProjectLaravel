@extends('layouts.app')

@section('title', 'Tambah Pengiriman')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Tambah Pengiriman</h2>

    <form action="{{ route('admin.pengiriman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Perangkat</label>
            <select name="device_id" class="form-control" required>
                @foreach($devices as $device)
                    <option value="{{ $device->id }}">{{ $device->serial_number }} - {{ $device->merk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penerima</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <input type="text" name="divisi" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Kapal</label>
            <input type="text" name="kapal" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Cabang</label>
            <input type="text" name="cabang" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Status Pengiriman</label>
            <select name="status_pengiriman" class="form-control" required>
                <option value="Dikirim">Dikirim</option>
                <option value="Diterima">Diterima</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
