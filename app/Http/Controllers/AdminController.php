<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.index');
        }

        return view('admin.login', [
            'title' => 'Admin Login - WASH WISH WOOSH',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $adminUsername = config('admin.username');
        $adminPassword = config('admin.password');

        if (
            $request->input('username') !== $adminUsername ||
            !$adminPassword ||
            !Hash::check($request->input('password'), $adminPassword)
        ) {
            return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
        }

        $request->session()->regenerate();
        session(['admin_logged_in' => true]);

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');

        return redirect()->route('admin.login');
    }

    public function index()
    {
        $orders = Order::orderByDesc('waktu_pesan')->get();
        $reviews = Review::orderByDesc('waktu_ulasan')->get();
        $counts = collect(Order::STATUSES)
            ->mapWithKeys(fn ($status) => [$status => $orders->where('status', $status)->count()])
            ->toArray();

        return view('admin.index', [
            'title' => 'Admin Pesanan - WASH WISH WOOSH',
            'orders' => $orders,
            'reviews' => $reviews,
            'statuses' => Order::STATUSES,
            'counts' => $counts,
        ]);
    }

    public function update(Request $request)
    {
        $action = $request->input('action');
        $code = trim($request->input('kode', ''));

        if ($action === 'update_status') {
            $request->validate([
                'kode' => 'required|string',
                'status' => 'required|in:' . implode(',', Order::STATUSES),
            ]);

            $order = Order::where('kode', $code)->first();
            if (!$order) {
                return redirect()->route('admin.index')->with('error', 'Pesanan tidak ditemukan.');
            }

            $order->update(['status' => $request->input('status')]);

            return redirect()->route('admin.index')->with('success', 'Status pesanan berhasil diperbarui.');
        } elseif ($action === 'delete_order') {
            if (!$code) {
                return redirect()->route('admin.index')->with('error', 'Kode pesanan tidak valid.');
            }

            Order::where('kode', $code)->delete();
            Review::where('kode', $code)->delete();

            return redirect()->route('admin.index')->with('success', 'Pesanan berhasil dihapus.');
        } elseif ($action === 'delete_review') {
            $reviewId = $request->input('review_id');
            if ($reviewId) {
                Review::where('id', $reviewId)->delete();
                return redirect()->route('admin.index')->with('success', 'Ulasan berhasil dihapus.');
            }
        }

        return redirect()->route('admin.index');
    }

    public function showServices()
    {
        $services = \App\Models\Service::all();

        return view('admin.services', [
            'title' => 'Kelola Layanan - WASH WISH WOOSH',
            'services' => $services,
        ]);
    }

    public function storeService(Request $request)
    {
        return redirect()->route('admin.services')->with('info', 'Layanan bersifat statis dan diatur di source code (app/Models/Service.php).');
    }
}
