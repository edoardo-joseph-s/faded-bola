<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CsvDataSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $basePath = storage_path('data');
        $this->importOrders($basePath . '/pesanan.csv');
        $this->importReviews($basePath . '/ulasan.csv');
    }

    private function importOrders(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }

        $handle = fopen($path, 'r');
        if (!$handle) {
            return;
        }

        $headers = fgetcsv($handle);
        if ($headers === false) {
            fclose($handle);
            return;
        }

        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($headers, $row);
            if (!$data) {
                continue;
            }

            Order::updateOrCreate(
                ['kode' => $data['kode'] ?? ''],
                [
                    'waktu_pesan' => $data['waktu_pesan'] ?? now()->toDateTimeString(),
                    'status' => $data['status'] ?? 'Baru',
                    'estimasi_harga' => $data['estimasi_harga'] ?? '',
                    'nama' => $data['nama'] ?? '',
                    'telepon' => $data['telepon'] ?? '',
                    'email' => $data['email'] ?? '',
                    'layanan' => $data['layanan'] ?? '',
                    'ukuran' => $data['ukuran'] ?? '',
                    'tipe_mobil' => $data['tipe_mobil'] ?? '',
                    'tanggal' => $data['tanggal'] ?? now()->format('Y-m-d'),
                    'jam' => $data['jam'] ?? '08:00',
                    'domisili' => $data['domisili'] ?? '',
                    'alamat' => $data['alamat'] ?? '',
                    'catatan' => $data['catatan'] ?? '',
                    'created_at' => $data['waktu_pesan'] ?? now()->toDateTimeString(),
                ]
            );
        }

        fclose($handle);
    }

    private function importReviews(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }

        $handle = fopen($path, 'r');
        if (!$handle) {
            return;
        }

        $headers = fgetcsv($handle);
        if ($headers === false) {
            fclose($handle);
            return;
        }

        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($headers, $row);
            if (!$data) {
                continue;
            }

            Review::updateOrCreate(
                [
                    'kode' => $data['kode'] ?? '',
                    'waktu_ulasan' => $data['waktu_ulasan'] ?? now()->toDateTimeString(),
                    'nama' => $data['nama'] ?? '',
                    'rating' => $data['rating'] ?? 0,
                ],
                [
                    'ulasan' => $data['ulasan'] ?? '',
                    'created_at' => $data['waktu_ulasan'] ?? now()->toDateTimeString(),
                ]
            );
        }

        fclose($handle);
    }
}
