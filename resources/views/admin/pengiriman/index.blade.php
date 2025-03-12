@extends('layouts.app')

@section('title', 'Daftar Pengiriman')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Daftar Pengiriman</h2>

    <a href="{{ route('admin.pengiriman.create') }}" class="btn btn-primary mb-3">Tambah Pengiriman</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Perangkat</th>
                <th>Penerima</th>
                <th>Divisi</th>
                <th>Kapal</th>
                <th>Cabang</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengiriman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->device->serial_number }} - {{ $item->device->merk }}</td>
                <td>{{ $item->user_name }}</td>
                {{-- <td>
                    {{ $item->divisi ?? '-' }} /
                    {{ $item->kapal ?? '-' }} /
                    {{ $item->cabang ?? '-' }}
                </td> --}}
                <td>{{ $item->divisi ?? '-' }}</td>
                <td>{{ $item->kapal ?? '-' }}</td>
                <td>{{ $item->cabang ?? '-' }}</td>
                <td>{{ $item->status_pengiriman }}</td>
                <td>
                    <a href="{{ route('admin.pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.pengiriman.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengiriman ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
