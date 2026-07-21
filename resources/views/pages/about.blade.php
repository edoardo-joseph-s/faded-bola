@extends('layouts.app')

@section('content')
<section class="grid grid-cols-[minmax(0,1fr)_minmax(360px,.82fr)] gap-12 items-center min-h-[680px] pt-[150px] px-[7%] pb-[76px] page-hero max-md:grid-cols-1 max-md:py-[132px] max-md:px-[5%] max-[640px]:py-[126px] max-[640px]:px-[22px]">
    <div class="max-w-[720px]">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Tentang Kami</span>
        <h1 class="max-w-[720px] text-[56px] leading-[1.1] mb-[22px] max-md:text-[42px] max-[640px]:text-[36px]">Perawatan mobil yang mudah dipesan, jelas diproses</h1>
        <p class="max-w-[640px] text-muted text-[18px] leading-[1.8] mb-[30px]">Wash Wish Woosh membantu pelanggan merawat mobil tanpa proses pemesanan yang rumit. Semua pesanan masuk dari website, dipantau customer service, lalu dikerjakan sesuai jadwal dan ukuran kendaraan.</p>
        <div class="flex gap-4 flex-wrap">
            <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="{{ route('gallery') }}">Lihat Galeri</a>
            <a class="inline-flex items-center justify-center min-h-12 px-7 rounded-lg text-[15px] font-extrabold bg-accent text-white shadow-[0_14px_28px_rgba(246,179,50,.28)] hover:bg-accent-dark hover:-translate-y-0.5 transition-all" href="{{ route('home') }}#paket">Lihat Layanan</a>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-line shadow-[0_28px_70px_rgba(21,35,48,.14)]">
        <img class="w-full h-[430px] object-cover max-md:h-[320px] max-[640px]:h-[260px]" src="{{ asset('assets/images/about/foto.jpg') }}" alt="Tentang Wash Wish Woosh" loading="lazy">
    </div>
</section>

<section class="py-[92px] px-[7%] bg-white max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Visi</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Membuat perawatan mobil lebih tertata</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Kami ingin setiap pelanggan bisa memilih layanan, melihat estimasi harga, menentukan jadwal, dan mendapatkan konfirmasi dari customer service dalam satu alur yang jelas.</p>
    </div>
    <div class="grid grid-cols-3 gap-[22px] max-[1060px]:grid-cols-2 max-md:grid-cols-1">
        @foreach([['Cara Kerja','Pelanggan mengisi form web, sistem menyimpan pesanan, customer service mengubah status, lalu pesanan diproses sampai selesai.'],['Area Layanan','Fokus utama kami adalah DKI Jakarta, dengan jadwal layanan mulai 08.00 sampai 17.00 WIB.'],['Standar Pengerjaan','Setiap layanan mengikuti detail area kerja: body, kabin, kaca, mesin, ban, atau velg sesuai paket yang dipilih.']] as [$cardTitle,$desc])
        <article class="min-h-[230px] p-7 bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.07)]">
            <h3 class="text-[22px] mb-3.5">{{ $cardTitle }}</h3>
            <p class="text-muted leading-[1.75]">{{ $desc }}</p>
        </article>
        @endforeach
    </div>
</section>
@endsection
