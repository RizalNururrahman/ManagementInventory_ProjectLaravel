<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('admin.devices.index', compact('devices'));
    }

    public function create()
    {
        return view('admin.devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|unique:devices',
            'merk' => 'required',
            'metode_pembelian' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        Device::create($request->all());

        // return redirect()->route('devices.index')->with('success', 'Perangkat berhasil ditambahkan');
        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $device = Device::findOrFail($id);
        return view('admin.devices.edit', compact('device'));
    }

    public function update(Request $request, $id)
    {
        // $device = Device::findOrFail($id);
        // $device->update($request->all());

        // return redirect()->route('devices.index')->with('success', 'Perangkat berhasil diperbarui');
        $request->validate([
            'serial_number' => 'required|unique:devices,serial_number,' . $id,
            'merk' => 'required',
            'metode_pembelian' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $device = Device::findOrFail($id);
        $device->update($request->all());

        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        // return redirect()->route('devices.index')->with('success', 'Perangkat berhasil dihapus');
        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil dihapus');
    }
}
