@extends('layouts.app')

@section('content')
<section class="hero-home min-h-screen flex items-center pt-[148px] px-[7%] pb-22 max-md:min-h-[760px] max-md:pt-[170px] max-[640px]:min-h-[720px] max-[640px]:px-[22px] max-[640px]:pt-[150px] max-[640px]:pb-16" id="home">
    <div class="max-w-[680px]">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-[10px] px-4 mb-[22px]">Cuci Mobil Datang ke Rumah</span>
        <h1 class="max-w-[650px] text-ink text-[62px] leading-[1.08] mb-6 max-md:text-[46px] max-[640px]:text-[38px]">Rawat Mobil Tanpa Keluar Rumah</h1>
        <p class="max-w-[610px] text-muted text-[19px] leading-[1.8] mb-[34px] max-md:text-base max-[640px]:text-[16px]">Wash Wish Woosh membantu Anda menjaga mobil tetap bersih, wangi, dan nyaman dengan layanan terjadwal langsung di lokasi.</p>
        <div class="flex flex-wrap gap-3.5 max-[640px]:grid max-[640px]:grid-cols-1">
            <a class="inline-flex items-center justify-center min-h-12 px-6 rounded-lg text-[15px] font-extrabold text-primary-dark bg-white border border-primary/[.22] hover:text-white hover:bg-primary hover:-translate-y-0.5 transition-all" href="#paket">Lihat Paket</a>
        </div>
    </div>
</section>

<section class="py-[92px] px-[7%] bg-soft max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Kenapa Pilih Kami</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Perawatan mobil yang rapi, praktis, dan jelas harganya</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Dari cuci interior-eksterior sampai salon detail, setiap layanan dibuat agar pelanggan bisa pesan mudah, pilih ukuran mobil, lalu tunggu tim datang.</p>
    </div>
    <div class="grid grid-cols-4 gap-[22px] max-[1060px]:grid-cols-2 max-[640px]:grid-cols-1">
        @foreach([['01','Datang Sesuai Jadwal','Anda pilih tanggal dan jam, tim kami datang ke alamat pengerjaan.'],['02','Pengerjaan Rapi','Setiap area mobil dibersihkan dengan alur kerja yang terukur.'],['03','Harga Transparan','Harga dibagi berdasarkan ukuran mobil Small, Medium, dan Large.'],['04','Wash Wish Woosh','Pesanan dari web dibantu dan dikonfirmasi oleh tim Wash Wish Woosh - Layanan Cuci & Salon Mobil.']] as [$num,$title,$desc])
        <article class="min-h-[230px] p-7 bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.06)]">
            <div class="w-12 h-12 grid place-items-center mb-[22px] text-white bg-primary rounded-lg font-extrabold">{{ $num }}</div>
            <h3 class="text-xl mb-3">{{ $title }}</h3>
            <p class="text-muted leading-[1.7]">{{ $desc }}</p>
        </article>
        @endforeach
    </div>
</section>

<section class="py-[92px] px-[7%] bg-white max-[640px]:py-[70px] max-[640px]:px-[22px]" id="paket">
    <div class="max-w-[760px] mx-auto mb-12 text-center">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">Pilihan Paket</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-[640px]:text-[31px]">Layanan lengkap untuk mobil Anda</h2>
        <p class="text-muted text-[17px] leading-[1.7]">Pilih layanan sesuai kebutuhan mobil, lalu isi form pemesanan dari web.</p>
    </div>
    <div class="grid grid-cols-3 gap-7 max-md:grid-cols-1">
        @foreach($services as $slug => $service)
            <article class="overflow-hidden bg-white border border-line rounded-lg shadow-[0_18px_45px_rgba(21,35,48,.08)] transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_24px_58px_rgba(21,35,48,.12)]">
                <img class="h-[235px] object-cover bg-[#d8eef8] max-[640px]:h-[210px]" src="{{ asset($service['image']) }}" alt="{{ $service['image_alt'] }}" loading="lazy">
                <div class="p-7">
                    <h3 class="text-[22px] mb-3">{{ $service['title'] }}</h3>
                    <p class="text-muted leading-[1.7] mb-[18px]">{{ $service['description'] }}</p>
                    <a class="text-primary-dark font-extrabold" href="{{ route('services.' . $slug) }}">Lihat detail</a>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="py-[110px] px-[7%] bg-[#f5fbff] overflow-hidden max-md:px-[5%] max-[640px]:py-[70px] max-[640px]:px-[22px]">
    <div class="max-w-[760px] mx-auto mb-12 text-center max-[640px]:mb-8">
        <span class="inline-flex items-center text-primary bg-primary/10 border border-primary/[.16] rounded-full text-[13px] font-extrabold uppercase py-2 px-3.5 mb-4">TESTIMONI</span>
        <h2 class="text-ink text-[40px] leading-[1.2] mb-4 max-md:text-[38px] max-[640px]:text-[31px]">Kata mereka yang telah menggunakan Wash Wish Woosh</h2>
    </div>
    <div class="relative w-full mt-[60px]">
        <button class="absolute top-1/2 -translate-y-1/2 w-[62px] h-[62px] border-0 rounded-full bg-primary text-white text-[26px] cursor-pointer z-20 shadow-[0_10px_30px_rgba(0,0,0,.15)] hover:bg-primary-dark hover:scale-[1.08] transition-all left-0 max-md:hidden" onclick="slideTestimonial(-1)" aria-label="Ulasan sebelumnya">&#10094;</button>
        <div class="flex gap-7 overflow-x-auto scroll-smooth py-2.5 px-20 max-md:px-5 max-md:gap-5 testimonial-slider" id="testimonialSlider">
            @foreach($reviews->reverse() as $review)
                @php
                    $rating = (int) $review->rating;
                    $stars = str_repeat('★', $rating);
                    $ratingLabels = [5 => 'Sangat Puas', 4 => 'Puas', 3 => 'Cukup', 2 => 'Kurang', 1 => 'Perlu Diperbaiki'];
                    $label = $ratingLabels[$rating] ?? 'Tanpa Rating';
                    $reviewOrder = $ordersByCode[$review->kode] ?? null;
                @endphp
                <div class="min-w-[420px] max-w-[420px] min-h-[320px] bg-white rounded-[18px] p-[42px] shrink-0 shadow-[0_10px_40px_rgba(0,0,0,.05)] max-md:min-w-[88%] max-md:max-w-[88%]">
                    <div class="text-[70px] text-primary leading-none mb-5">&#10077;</div>
                    <p class="text-[19px] leading-[1.8] text-ink mb-[38px]">"{{ $review->ulasan }}"</p>
                    <div class="w-full h-[2px] bg-line mb-7"></div>
                    <cite class="not-italic text-[18px] font-extrabold text-ink">
                        {{ $review->nama }}
                        <div class="mt-3 flex flex-col gap-1">
                            <span class="text-[#fbbf24] text-[22px] tracking-[3px]">{{ $stars }}</span>
                            <span class="text-muted text-[15px] font-semibold">{{ $label }}</span>
                        </div>
                        @if($reviewOrder && $reviewOrder)
                            <small class="block mt-2 text-muted text-sm font-bold">{{ $reviewOrder }}</small>
                        @endif
                    </cite>
                </div>
            @endforeach
        </div>
        <button class="absolute top-1/2 -translate-y-1/2 w-[62px] h-[62px] border-0 rounded-full bg-primary text-white text-[26px] cursor-pointer z-20 shadow-[0_10px_30px_rgba(0,0,0,.15)] hover:bg-primary-dark hover:scale-[1.08] transition-all right-0 max-md:hidden" onclick="slideTestimonial(1)" aria-label="Ulasan berikutnya">&#10095;</button>
    </div>
</section>
@endsection
