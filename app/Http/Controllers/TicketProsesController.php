<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;

class TicketProsesController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('status', 'proses')->get();
        return view('ticketproses', compact('tickets'));
    }

    public function proses($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'proses';
        $ticket->save();

        return redirect()->route('ticketproses')->with('success', 'Ticket status updated to "proses".');
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')->get();
        foreach ($tickets as $ticket) {
            $ticket->photo_closed_url = $ticket->photo_closed ? Storage::url($ticket->photo_closed) : null;
        }
        return view('ticketclosed', compact('tickets'));

    }

    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'closed';
        $ticket->save();

        return redirect()->route('ticketproses')->with('success', 'Ticket status updated to "closed".');
    }
}
