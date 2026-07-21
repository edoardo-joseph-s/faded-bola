<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:120',
            'telepon' => ['required', 'regex:/^[0-9]{10,15}$/'],
            'email' => 'nullable|email|max:150',
            'layanan' => 'required|string',
            'ukuran' => 'required|string',
            'tipe_mobil' => 'required|string|max:120',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => 'required|in:' . implode(',', Order::timeSlots()),
            'domisili' => 'required|in:' . implode(',', Order::DOMICILES),
            'alamat' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $priceList = app(\App\Models\Service::class)::priceList();
        $selectedPrice = $priceList[$validated['layanan']][$validated['ukuran']] ?? null;

        if (!$selectedPrice) {
            return back()->withInput()->withErrors(['layanan' => 'Kombinasi layanan dan ukuran mobil belum tersedia.']);
        }

        $order = Order::create([
            'kode' => 'WWW-' . now()->format('Ymd-His'),
            'waktu_pesan' => now(),
            'status' => 'Baru',
            'estimasi_harga' => $selectedPrice,
            'nama' => $validated['nama'],
            'telepon' => $validated['telepon'],
            'email' => $validated['email'] ?? '',
            'layanan' => $validated['layanan'],
            'ukuran' => $validated['ukuran'],
            'tipe_mobil' => $validated['tipe_mobil'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'domisili' => $validated['domisili'],
            'alamat' => $validated['alamat'],
            'catatan' => $validated['catatan'] ?? '',
        ]);

        return view('orders.confirmation', [
            'title' => 'Konfirmasi Pesanan - WASH WISH WOOSH',
            'order' => $order,
            'saved' => true,
            'errors' => [],
        ]);
    }
}
