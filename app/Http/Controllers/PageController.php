<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about', [
            'title' => 'Tentang Kami - Wash Wish Woosh',
        ]);
    }

    public function gallery()
    {
        return view('pages.gallery', [
            'title' => 'Galeri Layanan - WASH WISH WOOSH',
        ]);
    }

    public function pricing()
    {
        return view('pages.pricing', [
            'title' => 'Harga Layanan - WASH WISH WOOSH',
            'services' => Service::all(),
        ]);
    }

    public function notFound()
    {
        return response()->view('errors.404', [
            'title' => '404 - Halaman Tidak Ditemukan',
        ], 404);
    }

    public function contact(Request $request)
    {
        $services = Service::all();
        $priceList = Service::priceList();
        $selectedService = trim($request->query('layanan', ''));
        $selectedSize = trim($request->query('ukuran', ''));

        if (!isset($priceList[$selectedService])) {
            $selectedService = $services[array_key_first($services)]['title'] ?? '';
        }

        if (!isset($priceList[$selectedService][$selectedSize])) {
            $selectedSize = array_key_first($priceList[$selectedService] ?? []) ?? '';
        }

        return view('orders.form', [
            'title' => 'Form Pemesanan - WASH WISH WOOSH',
            'scripts' => ['booking.js'],
            'services' => $services,
            'selectedService' => $selectedService,
            'selectedSize' => $selectedSize,
            'selectedPrice' => $priceList[$selectedService][$selectedSize] ?? 'Belum tersedia',
            'domiciles' => Order::DOMICILES,
            'timeSlots' => Order::timeSlots(),
            'bookedSlots' => Order::bookedSlots(),
        ]);
    }
}
