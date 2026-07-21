<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const STATUSES = ['Baru', 'Dikonfirmasi', 'Dikerjakan', 'Selesai', 'Dibatalkan'];
    public const DOMICILES = ['Jakarta Utara', 'Jakarta Barat', 'Jakarta Timur', 'Jakarta Selatan'];

    protected $fillable = [
        'kode',
        'waktu_pesan',
        'status',
        'estimasi_harga',
        'nama',
        'telepon',
        'email',
        'layanan',
        'ukuran',
        'tipe_mobil',
        'tanggal',
        'jam',
        'domisili',
        'alamat',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'kode', 'kode');
    }

    public static function timeSlots(): array
    {
        $slots = [];

        for ($hour = 8; $hour <= 17; $hour++) {
            $slots[] = sprintf('%02d:00', $hour);
        }

        return $slots;
    }

    public static function bookedSlots(): array
    {
        return self::query()
            ->select('tanggal', 'jam')
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get()
            ->groupBy(function ($item) {
                return $item->tanggal;
            })
            ->map(function ($group) {
                return $group->pluck('jam')->unique()->values()->toArray();
            })
            ->toArray();
    }
}
