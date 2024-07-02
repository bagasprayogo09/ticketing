<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;



class AdminController extends Controller
{
    // Menggunakan fitur otorisasi, dispatch jobs, dan validasi dari Laravel
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Fungsi untuk menampilkan halaman dashboard
    public function index(Request $request)
    {
        // Mengecek apakah user diizinkan untuk melihat daftar user
        $this->authorize('viewAny', User::class);

        // Ambil semua tiket yang statusnya 'open'
        $openTickets = Ticket::where('status', 'open')->get();
        // Ambil semua tiket yang statusnya 'proses'
        $inProgressTickets = Ticket::where('status', 'proses')->get();
        // Ambil semua tiket yang statusnya 'closed'
        $closedTickets = Ticket::where('status', 'closed')->get();

        // Hitung jumlah tiket yang statusnya 'open'
        $openTicketCount = $openTickets->count();
        // Hitung jumlah tiket yang statusnya 'proses'
        $inProgressTicketCount = $inProgressTickets->count();
        // Hitung jumlah tiket yang statusnya 'closed'
        $closedTicketCount = $closedTickets->count();

        // Tampilkan view 'dashboard' dengan data tiket dan jumlahnya
        return view('dashboard', compact('openTickets', 'inProgressTickets', 'closedTickets', 'openTicketCount', 'inProgressTicketCount', 'closedTicketCount'));

    }
}
