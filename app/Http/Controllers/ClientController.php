<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {// Mendapatkan user yang sedang login
    $user = Auth::user();

    // Mengambil tiket yang dibuat oleh user yang sedang login
    $tickets = Ticket::where('user_id', $user->id)->get();
    // Mengambil tiket yang dibuat oleh user yang sedang login
    $openTickets = Ticket::where('user_id', $user->id)->where('status', 'open')->get();
    $inProgressTickets = Ticket::where('user_id', $user->id)->where('status', 'proses')->get();
    $closedTickets = Ticket::where('user_id', $user->id)->where('status', 'closed')->get();

    // Menghitung jumlah tiket untuk setiap status
    $openTicketCount = $openTickets->count();
    $inProgressTicketCount = $inProgressTickets->count();
    $closedTicketCount = $closedTickets->count();

    // Mengirimkan data tiket ke view
    return view('client.clientdashboard', compact('openTickets', 'inProgressTickets', 'closedTickets', 'openTicketCount', 'inProgressTicketCount', 'closedTicketCount'));
}
    }


