@extends('layouts.admin')

@section('content')
<main class="min-h-screen py-11 px-[5%] pb-20 admin-bg max-[640px]:py-7 max-[640px]:px-[18px] max-[640px]:pb-[58px]">

    {{-- Header --}}
    <header class="flex items-center justify-between py-4 mb-8">
        <a class="flex items-center gap-2" href="{{ route('admin.index') }}">
            <img src="{{ asset('assets/images/favicon/www-logo.png') }}" alt="Wash Wish Woosh" class="h-12 w-12 object-contain rounded-xl">
            <span class="font-extrabold text-ink text-lg">Wash Wish Woosh</span>
        </a>
        <nav class="flex gap-5 items-center text-sm font-bold">
            <a class="text-primary-dark hover:text-primary transition-colors" href="{{ route('home') }}">Website</a>
            <a class="text-primary-dark hover:text-primary transition-colors" href="{{ route('pricing') }}">Harga</a>
            <span class="w-px h-4 bg-line"></span>
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button class="text-[#e24d4d] hover:text-[#c93636] transition-colors cursor-pointer bg-transparent border-0 text-sm font-bold" type="submit">Logout</button>
            </form>
        </nav>
    </header>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="mb-6 p-4 text-[#05603a] bg-[#ecfdf3] border border-[#abefc6] rounded-lg font-extrabold">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-6 p-4 text-[#5a1010] bg-[#fff1f0] border border-[#fecdca] rounded-lg font-extrabold">{{ session('error') }}</div>
    @endif
    @if (session('info'))
        <div class="mb-6 p-4 text-ink bg-[#f4f9fc] border border-line rounded-lg font-extrabold">{{ session('info') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-6 p-4 text-[#5a1010] bg-[#fff1f0] border border-[#fecdca] rounded-lg font-extrabold">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Page heading --}}
    <section class="max-w-[980px] mx-auto mb-9 text-center">
        <span class="text-muted text-xs font-extrabold uppercase tracking-wider">Dashboard</span>
        <h1 class="text-[44px] leading-[1.12] mt-2 mb-3 max-[640px]:text-[32px]">Panel Admin</h1>
        <p class="text-muted text-base leading-relaxed">Kelola pesanan, ubah status pengerjaan, dan lihat ulasan pelanggan.</p>
    </section>

    {{-- Status cards --}}
    <section class="relative overflow-hidden max-w-[1280px] mx-auto mb-9 p-8 bg-white/95 border border-line rounded-3xl shadow-[0_26px_80px_rgba(21,35,48,.10)]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-muted text-xs font-extrabold uppercase tracking-wider">Ringkasan</span>
                <h2 class="text-xl font-bold mt-1">Status Pesanan</h2>
            </div>
            <span class="text-muted text-sm font-semibold">{{ $orders->count() }} total pesanan &middot; {{ $reviews->count() }} ulasan</span>
        </div>

        <div class="grid grid-cols-5 gap-4 max-[1060px]:grid-cols-2 max-[640px]:grid-cols-2">
            @php
                $statusColors = [
                    'Baru' => ['bg' => '#eff8ff', 'text' => '#175cd3', 'border' => '#b4cffd'],
                    'Dikonfirmasi' => ['bg' => '#fef5f2', 'text' => '#b42318', 'border' => '#fecdca'],
                    'Dikerjakan' => ['bg' => '#fef5f2', 'text' => '#b54708', 'border' => '#f9d59e'],
                    'Selesai' => ['bg' => '#ecfdf3', 'text' => '#05603a', 'border' => '#abefc6'],
                    'Dibatalkan' => ['bg' => '#f4f9fc', 'text' => '#667085', 'border' => '#e7edf3'],
                ];
            @endphp
            @foreach ($counts as $status => $total)
                @php $color = $statusColors[$status] ?? ['bg' => '#f4f9fc', 'text' => '#667085', 'border' => '#e7edf3']; @endphp
                <article class="p-5 rounded-2xl border" style="background:{{ $color['bg'] }};border-color:{{ $color['border'] }}">
                    <span class="block text-xs font-extrabold uppercase tracking-wider" style="color:{{ $color['text'] }}">{{ $status }}</span>
                    <strong class="block mt-2 text-[32px] leading-none" style="color:{{ $color['text'] }}">{{ $total }}</strong>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Orders table --}}
    <section class="relative overflow-hidden max-w-[1280px] mx-auto mb-9 p-8 bg-white/95 border border-line rounded-3xl shadow-[0_26px_80px_rgba(21,35,48,.10)]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-muted text-xs font-extrabold uppercase tracking-wider">Operasional</span>
                <h2 class="text-xl font-bold mt-1">Daftar Pesanan</h2>
            </div>
        </div>

        <div class="table-scroll-wrapper overflow-x-auto border border-line rounded-2xl bg-white">
            <table class="w-full border-collapse min-w-[960px]">
                <thead>
                    <tr>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Kode</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Pelanggan</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Layanan</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Jadwal</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Harga</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-left uppercase tracking-wider">Status</th>
                        <th class="bg-[#101820] text-white text-xs font-bold py-4 px-5 text-center uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b border-line last:border-b-0">
                            <td class="py-4 px-5 align-top">
                                <span class="font-extrabold text-sm break-all leading-snug">{{ $order->kode }}</span>
                            </td>
                            <td class="py-4 px-5 align-top">
                                <strong class="block">{{ $order->nama }}</strong>
                                <a class="block text-primary-dark hover:text-primary transition-colors text-sm" href="tel:{{ $order->telepon }}">{{ $order->telepon }}</a>
                                @if($order->email)
                                    <span class="block text-muted text-xs mt-0.5 break-all">{{ $order->email }}</span>
                                @endif
                                <span class="block text-muted text-xs mt-0.5">{{ $order->domisili }}</span>
                            </td>
                            <td class="py-4 px-5 align-top">
                                <strong class="block">{{ $order->layanan }}</strong>
                                <span class="block text-muted text-xs mt-0.5">{{ $order->ukuran }} &middot; {{ $order->tipe_mobil }}</span>
                                <span class="block text-muted text-xs mt-0.5 leading-relaxed">{{ $order->alamat }}</span>
                            </td>
                            <td class="py-4 px-5 align-top">
                                <strong class="block">{{ $order->tanggal->format('d M Y') }}</strong>
                                <span class="block text-muted text-xs mt-0.5">{{ substr($order->jam, 0, 5) }} WIB</span>
                            </td>
                            <td class="py-4 px-5 align-top font-extrabold">{{ $order->estimasi_harga }}</td>
                            <td class="py-4 px-5 align-top">
                                <form class="flex gap-1.5 items-start" action="{{ route('admin.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="kode" value="{{ $order->kode }}">
                                    <select class="flex-1 min-h-9 border border-[#d8e1ea] px-2 rounded-lg text-xs font-semibold" name="status">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    <button class="shrink-0 min-h-9 border-0 px-3 text-white bg-primary text-xs font-extrabold cursor-pointer rounded-lg hover:bg-primary-dark transition-colors" type="submit">OK</button>
                                </form>
                            </td>
                            <td class="py-4 px-5 align-top text-center">
                                @if ($order->status === 'Selesai')
                                    <a class="text-primary-dark font-extrabold text-sm hover:text-primary transition-colors" href="{{ route('reviews.index', ['kode' => $order->kode]) }}">Ulasan</a>
                                @else
                                    <span class="text-muted text-xs">&mdash;</span>
                                @endif
                                <form class="mt-1.5" action="{{ route('admin.update') }}" method="post" onsubmit="return confirm('Hapus pesanan ini?');">
                                    @csrf
                                    <input type="hidden" name="action" value="delete_order">
                                    <input type="hidden" name="kode" value="{{ $order->kode }}">
                                    <button class="text-[#e24d4d] hover:text-[#c93636] text-xs font-extrabold cursor-pointer bg-transparent border-0 transition-colors" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-12 px-5 text-center text-muted italic" colspan="7">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Reviews --}}
    <section class="relative overflow-hidden max-w-[1280px] mx-auto p-8 bg-white/95 border border-line rounded-3xl shadow-[0_26px_80px_rgba(21,35,48,.10)]">
        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-muted text-xs font-extrabold uppercase tracking-wider">Ulasan Pelanggan</span>
                <h2 class="text-xl font-bold mt-1">Masukan Layanan</h2>
            </div>
            <span class="text-muted text-sm font-semibold">{{ $reviews->count() }} ulasan</span>
        </div>

        <div class="grid grid-cols-3 gap-5 max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
            @forelse($reviews as $review)
                <article class="p-5 bg-soft border border-line rounded-2xl">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <strong class="text-sm">{{ $review->nama }}</strong>
                        <span class="shrink-0 text-xs font-extrabold px-2 py-0.5 rounded-full" style="background:{{ $review->rating >= 4 ? '#ecfdf3' : ($review->rating >= 3 ? '#fef5f2' : '#fff1f0') }};color:{{ $review->rating >= 4 ? '#05603a' : ($review->rating >= 3 ? '#b54708' : '#5a1010') }}">{{ $review->rating }}/5</span>
                    </div>
                    <p class="text-muted text-sm leading-relaxed mb-3">{{ $review->ulasan }}</p>
                    <small class="block text-muted text-xs">{{ $review->kode }} &middot; {{ $review->waktu_ulasan->format('d M Y H:i') }}</small>
                    <form class="mt-2" action="{{ route('admin.update') }}" method="post" onsubmit="return confirm('Hapus ulasan ini?');">
                        @csrf
                        <input type="hidden" name="action" value="delete_review">
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <button class="text-[#e24d4d] hover:text-[#c93636] text-xs font-extrabold cursor-pointer bg-transparent border-0 transition-colors" type="submit">Hapus</button>
                    </form>
                </article>
            @empty
                <article class="col-span-full p-8 bg-soft border border-line rounded-2xl text-center">
                    <strong class="text-muted">Belum ada ulasan.</strong>
                    <p class="text-muted text-sm mt-1">Ulasan pelanggan akan muncul di sini setelah pesanan selesai.</p>
                </article>
            @endforelse
        </div>
    </section>

</main>
@endsection
