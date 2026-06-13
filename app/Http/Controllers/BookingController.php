<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // 🟢 PERBAIKAN UTAMA: Mengatur Hak Akses Halaman Dashboard
    public function dashboard()
    {
        // Pengecekan: Jika user login adalah Admin
        if (Auth::user() && Auth::user()->role === 'admin') {

            // Mengambil hitungan jumlah data riil langsung dari MongoDB
            $total_ruangan = Ruangan::count();
            $total_booking = Booking::count();

            // Dilempar ke halaman view khusus admin
            return view('Admin.dashboardAdmin', compact('total_ruangan', 'total_booking'));
        }

        // --- JALUR USER BIASA ---
        // Jika yang login bukan admin, tampilkan dashboard user biasa beserta data ruangan
        $ruangans = Ruangan::all();
        return view('dashboard', compact('ruangans'));
    }

    public function index(Request $request)
    {
        $status = $request->query('status');

        if ($status) {
            $bookings = Booking::where('status', $status)->get();
        } else {
            $bookings = Booking::all();
        }

        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $ruangans = Ruangan::where('status', 'tersedia')->get();
        return view('booking.create', compact('ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id'     => 'required',
            'tanggal_pinjam' => 'required',
            'jam_mulai'      => 'required',
            'jam_selesai'    => 'required',
            'nama_acara'     => 'required',
        ]);

        Booking::create([
            'user_id'        => Auth::id(),
            'ruangan_id'     => $request->ruangan_id,
            'nama_acara'     => $request->nama_acara,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jam_mulai'      => $request->jam_mulai,
            'jam_selesai'    => $request->jam_selesai,
            'status'         => 'dibooking',
        ]);

        $ruangan = Ruangan::find($request->ruangan_id);
        if ($ruangan) {
            $ruangan->update(['status' => 'tidak tersedia']);
        }

        return redirect('/booking')->with('success', 'Booking ruangan berhasil diajukan!');
    }

    public function destroy(Request $request, $id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            if ($booking->user_id == Auth::id() || (Auth::user() && Auth::user()->role == 'admin')) {

                $ruangan = Ruangan::find($booking->ruangan_id);
                if ($ruangan) {
                    $ruangan->update(['status' => 'tersedia']);
                }

                $booking->delete();
                return redirect('/booking')->with('success', 'Booking berhasil dibatalkan.');
            }
        }

        return redirect('/booking')->with('error', 'Gagal membatalkan pesanan.');
    }
}
