@extends('layouts.app')

@section('content')
<section class="grid grid-cols-[minmax(0,1fr)_minmax(360px,.82fr)] gap-12 items-center min-h-[680px] pt-[150px] px-[7%] pb-[76px] page-hero max-md:grid-cols-1 max-md:py-[132px] max-md:px-[5%] max-[640px]:py-[126px] max-[640px]:px-[22px]">
    <div class="max-w-[720px]">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-[10px] px-4 mb-[22px]">Pemesanan Web</span>
        <h1 class="max-w-[720px] text-[56px] leading-[1.1] mb-[22px] max-md:text-[42px] max-[640px]:text-[36px]">Isi form untuk menjadwalkan layanan</h1>
        <p class="max-w-[640px] text-muted text-[18px] leading-[1.8] mb-[30px]">Pesanan masuk melalui website, lalu customer service Wash Wish Woosh akan mengecek detail kendaraan, alamat, dan jadwal yang Anda pilih.</p>
        <div class="flex gap-4 flex-wrap">
            <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="#form-pemesanan">Isi Form</a>
            <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('pricing') }}">Cek Harga</a>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-line shadow-[0_28px_70px_rgba(21,35,48,.14)]">
        <img class="h-[430px] object-cover max-md:h-[320px] max-[640px]:h-[260px]" src="{{ asset('assets/images/layanan/interior.jpeg') }}" alt="Form pemesanan">
    </div>
</section>

<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]" id="form-pemesanan">
    @if ($errors->any())
        <ul class="mb-6 p-4 pl-9 text-[#5a1010] bg-[#fff1f0] border border-[#fecdca] rounded-lg list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="grid grid-cols-[minmax(0,1.35fr)_minmax(300px,.65fr)] gap-7 items-start max-md:grid-cols-1">
        <form class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[34px] max-[640px]:p-6" action="{{ route('orders.store') }}" method="post">
            @csrf
            <input type="hidden" name="layanan" value="{{ old('layanan', $selectedService) }}">
            <input type="hidden" name="ukuran" value="{{ old('ukuran', $selectedSize) }}">

            <div class="mb-7">
                <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Form Pesanan</span>
                <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Detail pemesanan layanan</h2>
                <p class="text-muted text-[17px] leading-[1.7]">Lengkapi data berikut agar customer service dapat memproses pesanan dengan cepat.</p>
            </div>

            <div class="grid grid-cols-2 gap-3.5 mb-6 max-[640px]:grid-cols-1">
                <div class="p-[18px] bg-soft border border-line rounded-lg">
                    <span class="block text-muted text-[13px] font-extrabold uppercase">Paket Dipilih</span>
                    <strong class="block mt-1.5 text-ink leading-[1.35]">{{ old('layanan', $selectedService) ?: '-' }}</strong>
                </div>
                <div class="p-[18px] bg-soft border border-line rounded-lg">
                    <span class="block text-muted text-[13px] font-extrabold uppercase">Ukuran Mobil</span>
                    <strong class="block mt-1.5 text-ink leading-[1.35]">{{ old('ukuran', $selectedSize) ?: '-' }}</strong>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-[18px] max-[640px]:grid-cols-1">
                <label class="grid gap-[9px] text-ink font-extrabold">Nama Lengkap
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="text" name="nama" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Nomor Telepon
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="tel" name="telepon" placeholder="Contoh: 081234567890" value="{{ old('telepon') }}" pattern="[0-9]{10,15}" minlength="10" maxlength="15" inputmode="numeric" required>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Email
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}">
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Tipe Mobil
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="text" name="tipe_mobil" placeholder="Contoh: Avanza, Brio, Fortuner" value="{{ old('tipe_mobil') }}" required>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Tanggal Layanan
                    <input class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" type="date" name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" min="{{ now()->format('Y-m-d') }}" required>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Jam Layanan
                    <select class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" name="jam" id="jam-layanan" data-booked-slots="{{ json_encode($bookedSlots) }}" required>
                        <option value="">Pilih jam</option>
                        @foreach ($timeSlots as $slot)
                            <option value="{{ $slot }}" {{ old('jam') === $slot ? 'selected' : '' }}>{{ str_replace(':', '.', $slot) }} WIB</option>
                        @endforeach
                    </select>
                </label>
                <label class="grid gap-[9px] text-ink font-extrabold">Domisili
                    <select class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all" name="domisili" required>
                        <option value="">Pilih domisili</option>
                        @foreach ($domiciles as $domicile)
                            <option value="{{ $domicile }}" {{ old('domisili') === $domicile ? 'selected' : '' }}>{{ $domicile }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="flex justify-between items-center gap-[18px] my-[22px] py-5 px-5 bg-[#101820] text-white rounded-lg" id="estimasi-harga" aria-live="polite">
                <span class="text-white/70 font-extrabold">Estimasi Harga</span>
                <strong class="text-2xl leading-[1.2] text-right">{{ old('estimasi_harga', $selectedPrice) }}</strong>
            </div>

            <label class="grid gap-[9px] text-ink font-extrabold">Alamat Pengerjaan
                <textarea class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all resize-y leading-[1.6]" name="alamat" rows="4" placeholder="Tulis alamat lengkap dan patokan lokasi" required>{{ old('alamat') }}</textarea>
            </label>
            <label class="grid gap-[9px] text-ink font-extrabold">Catatan Tambahan
                <textarea class="w-full min-h-12 py-[13px] px-[14px] text-ink bg-white border border-[#d8e1ea] rounded-lg font-normal outline-none focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,174,239,.12)] transition-all resize-y leading-[1.6]" name="catatan" rows="4" placeholder="Contoh: noda khusus, akses parkir, atau permintaan layanan tambahan">{{ old('catatan') }}</textarea>
            </label>

            <button class="mt-[22px] border-0 cursor-pointer inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" type="submit">Kirim Pesanan</button>
        </form>

        <aside class="bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] p-[30px] max-[640px]:p-6 sticky top-[110px] max-md:static">
            <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Wash Wish Woosh - Layanan Cuci & Salon Mobil</span>
            <h2 class="text-[30px] leading-[1.25] my-4">Pesanan Anda dibantu oleh tim CS</h2>
            <p class="text-muted leading-[1.7]">Customer service akan mengecek ketersediaan jadwal, memastikan domisili, dan memberi konfirmasi pesanan.</p>
            <div class="grid gap-3.5 mt-6">
                <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Jam Layanan CS</strong><span class="block text-muted leading-[1.5]">08.00 - 17.00 WIB</span></div>
                <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Email</strong><span class="block text-muted leading-[1.5]">washwishwoosh@gmail.com</span></div>
                <div class="p-[18px] bg-soft border border-line rounded-lg"><strong class="block mb-1.5">Area Utama</strong><span class="block text-muted leading-[1.5]">Jakarta Utara, Barat, Timur, dan Selatan</span></div>
            </div>
        </aside>
    </div>
</section>
@endsection
