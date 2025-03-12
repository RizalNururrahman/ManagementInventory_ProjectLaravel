<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Device;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::with('device')->get();
        return view('admin.pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $devices = Device::all();
        return view('admin.pengiriman.create', compact('devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'user_name' => 'required',
            'divisi' => 'nullable',
            'kapal' => 'nullable',
            'cabang' => 'nullable',
            'status_pengiriman' => 'required|in:Dikirim,Diterima,Selesai',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $devices = Device::all(); // Untuk dropdown pilihan perangkat
        return view('admin.pengiriman.edit', compact('pengiriman', 'devices'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'user_name' => 'required',
            'divisi' => 'nullable',
            'kapal' => 'nullable',
            'cabang' => 'nullable',
            'status_pengiriman' => 'required|in:Dikirim,Diterima,Selesai',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->update($request->all());

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman berhasil diperbarui');
    }


    public function destroy($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->delete();

        return redirect()->route('admin.pengiriman.index')->with('success', 'Pengiriman berhasil dihapus.');
    }
}
