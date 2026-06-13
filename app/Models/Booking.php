<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Booking extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'bookings';
    protected $fillable = ['user_id', 'ruangan_id', 'nama_acara', 'tanggal_pinjam', 'jam_mulai', 'jam_selesai', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', '_id');
    }
}
