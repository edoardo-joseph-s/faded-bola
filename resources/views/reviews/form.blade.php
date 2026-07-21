@extends('layouts.app')

@section('content')
<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="grid grid-cols-[minmax(0,1.35fr)_minmax(300px,.65fr)] gap-7 items-start max-md:grid-cols-1">
        @if ($message)
            <div class="p-4 mb-4 text-[#05603a] bg-[#ecfdf3] border border-[#abefc6] rounded-lg font-extrabold">{{ $message }}</div>
        @endif

        <form class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[34px] max-[640px]:p-6" action="{{ route('reviews.store') }}" method="post">
            @csrf
            <div class="mb-7">
                <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Ulasan Pelanggan</span>
                <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Bantu kami meningkatkan layanan</h2>
                <p class="text-muted text-[17px] leading-[1.7]">Masukkan kode pesanan yang sudah selesai, lalu beri rating dan ulasan singkat.</p>
            </div>
            @if ($errors)
                <ul class="mb-6 p-4 pl-9 text-[#5a1010] bg-[#fff1f0] border border-[#fecdca] rounded-lg list-disc list-inside">
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="grid grid-cols-2 gap-[18px] max-[640px]:grid-cols-1">
                <label class="grid gap-[9px] text-ink font-extrabold">Kode Pesanan
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="text" name="kode" value="{{ old('kode', $kode) }}" placeholder="Contoh: WWW-20260520-123456" required>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Rating
                    <select class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" name="rating" required>
                        <option value="">Pilih rating</option>
                        @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} - {{ ['Sangat Puas','Puas','Cukup','Kurang','Perlu Diperbaiki'][5 - $i] }}</option>
                        @endfor
                    </select>
                </label>
            </div>
            <label class="grid gap-[9px] text-ink font-extrabold">Ulasan
                <textarea class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all resize-y leading-[1.6]" name="ulasan" rows="5" placeholder="Ceritakan pengalaman Anda setelah layanan selesai" required>{{ old('ulasan') }}</textarea>
            </label>
            <button class="mt-[22px] border-0 cursor-pointer inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" type="submit">Kirim Ulasan</button>
        </form>

        <aside class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[30px] max-[640px]:p-6 sticky top-[110px] max-md:static">
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Status Pesanan</span>
            <h2 class="text-[30px] leading-[1.25] my-4">{{ $order ? $order->status : 'Masukkan kode' }}</h2>
            <p class="text-muted leading-[1.7]">Ulasan akan diterima jika kode pesanan ditemukan dan statusnya sudah Selesai.</p>
            @if ($order)
                <div class="grid gap-3.5 mt-6">
                    <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Nama Pelanggan</strong><span class="block text-muted leading-[1.5]">{{ $order->nama }}</span></div>
                    <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Layanan</strong><span class="block text-muted leading-[1.5]">{{ $order->layanan }}</span></div>
                    <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Domisili</strong><span class="block text-muted leading-[1.5]">{{ $order->domisili }}</span></div>
                    <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Jadwal</strong><span class="block text-muted leading-[1.5]">{{ $order->tanggal->format('Y-m-d') }} {{ $order->jam }}</span></div>
                </div>
            @endif
        </aside>
    </div>
</section>
@endsection
