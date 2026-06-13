<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 4 Data Ruangan Kampus untuk disewakan/dibooking
        $data = [
            [
                'nama_ruangan' => 'Aula Gedung A (Rektorat)',
                'kapasitas' => 200,
                'lokasi' => 'Gedung A Lantai 1',
                'fasilitas' => 'AC, Sound System, Proyektor, Kursi 200x'
            ],
            [
                'nama_ruangan' => 'Laboratorium Komputer Terpadu',
                'kapasitas' => 40,
                'lokasi' => 'Gedung Kuliah Bersama Lt. 3',
                'fasilitas' => 'AC, 40 PC Client, LAN, Papan Tulis'
            ],
            [
                'nama_ruangan' => 'Ruang Rapat Utama (Gedung H)',
                'kapasitas' => 30,
                'lokasi' => 'Gedung H Lantai 2',
                'fasilitas' => 'AC, Meja Oval Besar, Mikrofon Rapat, TV LED'
            ],
            [
                'nama_ruangan' => 'Ruang Kelas Teori 2.04',
                'kapasitas' => 50,
                'lokasi' => 'Gedung Kuliah Bersama Lt. 2',
                'fasilitas' => 'AC, Proyektor, Kursi Kuliah 50x'
            ],
        ];

        foreach ($data as $r) {
            Ruangan::create($r);
        }
    }
}
