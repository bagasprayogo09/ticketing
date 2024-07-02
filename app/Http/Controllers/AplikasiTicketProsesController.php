<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AplikasiTicketProsesController extends Controller
{
    public function open()
    {
        $tickets = Ticket::where('status', 'open')
            ->whereIn('divisi', ['Aplikasi & Statistik'])
            ->get();
        return view('aplikasi.ticket_open', compact('tickets'));
    }

    public function prosess()
    {
        $tickets = Ticket::where('status','proses')
        ->whereIn('divisi', ['Aplikasi & Statistik'])
        ->get();
        return view('aplikasi.ticket_proses', compact('tickets'));
    }

    public function proses($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'proses';
        $ticket->save();
        Alert::success('Selamat Tiket Telah Di Perbaharui Ke Proses');
        return redirect()->route('aplikasi.ticket_proses');
    }

    public function show($nomor_ticket)
    {
        $ticket = Ticket::findOrFail($nomor_ticket);

        // Mengonversi path gambar menjadi URL
        $ticket->photo_url = $ticket->photo ? Storage::url('public/storage/' . $ticket->photo) : null;

        // Mengirimkan data tiket ke view
        return view('aplikasi.ticket_show', compact('ticket'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')
            ->whereIn('divisi', ['Aplikasi & Statistik'])
            ->get();

            foreach ($tickets as $ticket) {
                $ticket->photo_closed_url = $ticket->photo_closed ? Storage::url($ticket->photo_closed) : null;
            }

        return view('aplikasi.ticket_closed', compact('tickets'));
    }

    public function showCloseForm($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('aplikasi.ticket_closed.form', compact('ticket'));
    }

    public function close(Request $request, $id)
{
    $request->validate([
        'photo'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'catatan'   =>  'required|string|max:255',
    ]);

    $ticket = Ticket::findOrFail($id);

    // Upload the photo
    $photo = $request->file('photo');
    $photoPath = $photo->storePubliclyAs('ticket_photos', $photo->hashName());

    // Update the ticket status and photo path
    $ticket->status = 'closed';
    $ticket->photo_closed = $photoPath;
    $ticket->catatan = $request->input('catatan');
    $ticket->save();
    Alert::success('Selamat Tiket Telah Di selesaikan');
    return redirect()->route('aplikasi.ticket_proses');
}

}
