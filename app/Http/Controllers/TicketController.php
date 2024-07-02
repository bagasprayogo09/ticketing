<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Exports\TicketsExport;
use Maatwebsite\Excel\Facades\Excel;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usertype'          => 'nullable|string',
            'nama'              => 'required|string',
            'email'             => 'required|string',
            'departemen'        => 'required|string',
            'divisi'            => 'required|string',
            'kategori'          => 'required|string',
            'kecamatan'         => 'required|string',
            'description'       => 'required|string',
            'photo'             => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photo = $request->file('photo');
        $photo->storePubliclyAs('', $photo->hashName());

        Ticket::create([
            'nama'                  => $request->nama,
            'email'                 => $request->email,
            'departemen'            => $request->departemen,
            'divisi'                => $request->divisi,
            'kategori'              => $request->kategori,
            'kecamatan'             => $request->kecamatan,
            'description'           => $request->description,
            'photo'                 => $photo->hashName(),
            'status'                => 'open',
            'user_id'               => auth()->id(),
            'usertype'              => $request->usertype,
        ]);

        return redirect()->route('tickets')->with('success', 'Tiket berhasil dibuat.');
    }


    public function showOpenTickets()
    {
        $user = Auth::user();
        if (in_array($user->usertype, ['admin', 'petugas', 'koordinator'])) {
            $tickets = Ticket::where('status', 'open')->get();
        } else {
            $tickets = Ticket::where('status', 'open')->where('user_id', $user->id)->get();
        }
        return view('ticketopen', compact('tickets'));
    }

    public function indexForClient()
{
    $user = Auth::user();
    $tickets = Ticket::where('user_id', $user->id)->get();
    foreach ($tickets as $ticket) {
        $ticket->photo_closed_url = $ticket->photo_closed ? Storage::url($ticket->photo_closed) : null;
    }

    return view('client.ticketclient', compact('tickets'));
}

    public function show($nomor_ticket)
    {
        $ticket = Ticket::findOrFail($nomor_ticket);

        // Mengonversi path gambar menjadi URL
        $ticket->photo_url = $ticket->photo ? Storage::url('public/storage/' . $ticket->photo) : null;

        // Mengirimkan data tiket ke view
        return view('ticketshow', compact('ticket'));
    }
/**
     * Menampilkan halaman rekap tiket.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function rekapTicketPage(Request $request)
    {
        $query = Ticket::query();

        if ($request->has(['start_date', 'end_date'])) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $query->whereBetween('created_at', [$start_date, $end_date]);
        }

        $tickets = $query->get();

        return view('rekap_ticket', compact('tickets'));
    }

    /**
     * Export data tiket ke format Excel.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        return Excel::download(new TicketsExport($start_date, $end_date), 'tickets.xlsx');
    }

}
