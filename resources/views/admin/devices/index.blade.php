@extends('layouts.app')

@section('title', 'Daftar Perangkat')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Daftar Perangkat</h2>

    <a href="{{ route('admin.devices.create') }}" class="btn btn-primary mb-3">Tambah Perangkat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Serial Number</th>
                <th>Merk</th>
                <th>Metode Pembelian</th>
                <th>Qty</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $device->serial_number }}</td>
                <td>{{ $device->merk }}</td>
                <td>{{ $device->metode_pembelian }}</td>
                <td>{{ $device->quantity }}</td>
                <td>
                    <a href="{{ route('admin.devices.edit', $device->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus perangkat ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.pengiriman.index') }}" class="btn btn-success mb-3">Tambah Pengiriman</a>
</div>
@endsection
