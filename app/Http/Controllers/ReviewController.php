<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $kode = trim($request->input('kode', ''));
        $order = $kode ? Order::where('kode', $kode)->first() : null;

        return view('reviews.form', [
            'title' => 'Ulasan Pesanan - WASH WISH WOOSH',
            'kode' => $kode,
            'order' => $order,
            'errors' => session('errors') ? session('errors')->all() : [],
            'message' => session('message', ''),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'ulasan' => 'required|string',
        ]);

        $order = Order::where('kode', $validated['kode'])->first();

        if (!$order) {
            return back()->withInput()->withErrors(['kode' => 'Kode pesanan tidak ditemukan.']);
        }

        if ($order->status !== 'Selesai') {
            return back()->withInput()->withErrors(['kode' => 'Ulasan hanya bisa dikirim setelah pesanan berstatus Selesai.']);
        }

        $existingReview = Review::where('kode', $validated['kode'])->first();
        if ($existingReview) {
            return back()->withInput()->withErrors(['kode' => 'Ulasan untuk pesanan ini sudah pernah dikirim.']);
        }

        Review::create([
            'kode' => $validated['kode'],
            'waktu_ulasan' => now(),
            'nama' => $order->nama,
            'rating' => $validated['rating'],
            'ulasan' => $validated['ulasan'],
        ]);

        return redirect()->route('home')->with('message', 'Ulasan berhasil dikirim.');
    }
}
