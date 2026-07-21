<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'waktu_ulasan',
        'nama',
        'rating',
        'ulasan',
    ];

    protected $casts = [
        'waktu_ulasan' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'kode', 'kode');
    }
}
