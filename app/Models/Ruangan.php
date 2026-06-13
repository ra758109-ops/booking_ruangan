<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // sesuaikan dengan package mongodb mu

class Ruangan extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'ruangans';
    protected $fillable = ['kode_ruangan', 'nama_ruangan', 'kapasitas', 'lokasi', 'fasilitas', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'ruangan_id', '_id');
    }
}
