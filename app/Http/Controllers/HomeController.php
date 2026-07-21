<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::orderByDesc('waktu_ulasan')->get();
        $services = Service::all();
        $ordersByCode = Order::pluck('domisili', 'kode')->toArray();

        return view('home.index', [
            'title' => 'WASH WISH WOOSH - Cuci dan Salon Mobil Panggilan',
            'scripts' => ['ulasan_slide.js'],
            'services' => $services,
            'reviews' => $reviews,
            'ordersByCode' => $ordersByCode,
        ]);
    }
}
