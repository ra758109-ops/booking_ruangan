<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 👈 PENTING: Untuk mendeteksi role user login

class RuanganController extends Controller
{
    /**
     * Proteksi Hak Akses Admin melalui Constructor.
     * Semua fungsi di controller ini otomatis dikunci dan hanya bisa diakses oleh role admin.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user() && Auth::user()->role !== 'admin') {
                return redirect('/dashboard')->with('error', 'Akses ditolak! Menu tersebut khusus Admin.');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $query = Ruangan::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $ruangans = $query->get();

        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        Ruangan::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas'    => $request->kapasitas,
            'lokasi'       => $request->lokasi,
            'status'       => 'tersedia'
        ]);

        return redirect()->route('ruangan.index');
    }

    public function edit($id)
    {
        $ruangan = Ruangan::find($id);

        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        Ruangan::find($id)->update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas'    => $request->kapasitas,
            'lokasi'       => $request->lokasi,
            'status'       => $request->status
        ]);

        return redirect()->route('ruangan.index');
    }

    public function destroy($id)
    {
        Ruangan::find($id)->delete();

        return redirect()->route('ruangan.index');
    }
}
