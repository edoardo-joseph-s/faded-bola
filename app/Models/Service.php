<?php

namespace App\Models;

class Service
{
    public static function all(): array
    {
        return [
            'cuci' => [
                'title' => 'Cuci Mobil Interior & Eksterior',
                'eyebrow' => 'Cuci Interior & Eksterior',
                'description' => 'Paket cuci mobil lengkap untuk membersihkan bagian luar dan kabin ringan agar mobil kembali segar tanpa perlu antre.',
                'image' => 'assets/images/layanan/cuci mobil.jpg',
                'image_alt' => 'Cuci mobil panggilan',
                'features' => [
                    'Pembersihan body mobil menggunakan sampo aman untuk cat.',
                    'Lap kering microfiber agar hasil bersih dan minim baret.',
                    'Vacuum interior untuk kabin, karpet, bagasi, dan sela jok.',
                    'Pembersihan dashboard, panel pintu, kaca, ban, dan velg bagian luar.',
                ],
                'prices' => self::sizes('Rp 100.000', 'Rp 125.000', 'Rp 150.000'),
            ],
            'interior' => [
                'title' => 'Salon Mobil Interior',
                'eyebrow' => 'Interior',
                'description' => 'Perawatan kabin menyeluruh untuk jok, karpet, plafon, dashboard, dan area sempit yang sering terlewat.',
                'image' => 'assets/images/layanan/interior.jpeg',
                'image_alt' => 'Salon mobil interior',
                'features' => [
                    'Vacuum menyeluruh pada jok, karpet, bagasi, dan sela kabin.',
                    'Pembersihan noda ringan pada jok dan panel interior.',
                    'Perawatan dashboard, door trim, konsol, dan kisi AC.',
                    'Finishing kabin agar terasa lebih bersih dan nyaman digunakan.',
                ],
                'prices' => self::sizes('Rp 300.000', 'Rp 400.000', 'Rp 500.000'),
            ],
            'eksterior' => [
                'title' => 'Salon Mobil Eksterior',
                'eyebrow' => 'Eksterior',
                'description' => 'Perawatan body mobil untuk mengangkat kotoran membandel, mengembalikan kilau, dan membuat tampilan lebih segar.',
                'image' => 'assets/images/layanan/eksterior.jpeg',
                'image_alt' => 'Salon mobil eksterior',
                'features' => [
                    'Pembersihan body, sela emblem, handle pintu, dan area panel.',
                    'Treatment ringan untuk noda air dan kotoran yang menempel.',
                    'Finishing wax agar permukaan terasa lebih halus dan berkilau.',
                    'Pembersihan kaca luar, ban, dan velg sebagai pelengkap tampilan.',
                ],
                'prices' => self::sizes('Rp 200.000', 'Rp 350.000', 'Rp 450.000'),
            ],
            'kaca' => [
                'title' => 'Salon Mobil Kaca',
                'eyebrow' => 'Kaca',
                'description' => 'Membersihkan kaca mobil dari jamur, kerak air, dan noda ringan supaya pandangan berkendara kembali jernih.',
                'image' => 'assets/images/layanan/kaca.jpg',
                'image_alt' => 'Salon mobil kaca',
                'features' => [
                    'Pembersihan kaca depan, samping, belakang, dan spion.',
                    'Treatment jamur kaca dan noda air ringan.',
                    'Finishing agar kaca lebih bening dan nyaman saat berkendara.',
                    'Pemeriksaan hasil pada beberapa sudut pantulan cahaya.',
                ],
                'prices' => self::sizes('Rp 175.000', 'Rp 225.000', 'Rp 275.000'),
            ],
            'mesin' => [
                'title' => 'Salon Mobil Mesin',
                'eyebrow' => 'Mesin',
                'description' => 'Detailing ruang mesin untuk mengangkat debu, sisa oli ringan, dan kotoran agar area mesin terlihat lebih rapi.',
                'image' => 'assets/images/layanan/mesin.png',
                'image_alt' => 'Salon mobil mesin',
                'features' => [
                    'Pembersihan ruang mesin dengan metode aman dan terkontrol.',
                    'Detailing area plastik, selang, cover mesin, dan sela komponen.',
                    'Pengangkatan noda oli ringan dan debu yang menempel.',
                    'Finishing dressing ringan untuk tampilan mesin yang lebih segar.',
                ],
                'prices' => self::sizes('Rp 200.000', 'Rp 250.000', 'Rp 300.000'),
            ],
            'ban' => [
                'title' => 'Salon Mobil Ban & Velg',
                'eyebrow' => 'Ban & Velg',
                'description' => 'Perawatan ban dan velg untuk membersihkan debu rem, noda jalan, dan membuat kaki-kaki mobil tampak lebih segar.',
                'image' => 'assets/images/layanan/ban.jpg',
                'image_alt' => 'Salon mobil ban dan velg',
                'features' => [
                    'Pembersihan velg bagian luar dari debu rem dan kotoran jalan.',
                    'Detailing sisi ban agar warna terlihat lebih pekat.',
                    'Pembersihan sela palang velg sesuai akses dan kondisi kendaraan.',
                    'Finishing tire dressing untuk tampilan ban yang lebih rapi.',
                ],
                'prices' => self::sizes('Rp 150.000', 'Rp 200.000', 'Rp 250.000'),
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }

    public static function priceList(): array
    {
        $prices = [];

        foreach (self::all() as $service) {
            $prices[$service['title']] = [];
            foreach ($service['prices'] as $price) {
                $prices[$service['title']][$price['value']] = $price['price'];
            }
        }

        return $prices;
    }

    private static function sizes(string $small, string $medium, string $large): array
    {
        return [
            ['size' => 'Small', 'value' => 'Small - City Car', 'label' => 'City Car', 'cars' => 'Brio, Agya, Ayla, Yaris, Jazz', 'price' => $small],
            ['size' => 'Medium', 'value' => 'Medium - Sedan / Compact SUV', 'label' => 'Sedan & Compact SUV', 'cars' => 'Avanza, Xenia, HR-V, Vios, City', 'price' => $medium],
            ['size' => 'Large', 'value' => 'Large - SUV / MPV Besar', 'label' => 'SUV & MPV Besar', 'cars' => 'Fortuner, Pajero, Alphard, Innova', 'price' => $large],
        ];
    }
}
