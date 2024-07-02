<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;


class AplikasiController extends Controller
{


    public function index()
    {
        $tickets = Ticket::where('divisi', 'Aplikasi & Statistik')->get();
        return view('aplikasi.ticket_open', compact('tickets'));
    }

    public function ticket(Request $request)
    {// nama kolom division sesuai dengan di database

        $divisions = ['Aplikasi & Statistik'];

        $openTickets = Ticket::whereIn('divisi', $divisions)->where('status', 'open')->get();
        $inProgressTickets = Ticket::whereIn('divisi', $divisions)->where('status', 'proses')->get();
        $closedTickets = Ticket::whereIn('divisi', $divisions)->where('status', 'closed')->get();

        $openTicketCount = $openTickets->count();
        $inProgressTicketCount = $inProgressTickets->count();
        $closedTicketCount = $closedTickets->count();

        return view('aplikasi.dashboard', compact('openTickets', 'inProgressTickets', 'closedTickets', 'openTicketCount', 'inProgressTicketCount', 'closedTicketCount'));
    }


}
