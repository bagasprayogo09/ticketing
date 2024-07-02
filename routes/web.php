<?php

use App\Http\Controllers\AboutUSController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketProsesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAllUserController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\InfrastrukturDigitalController;
use App\Http\Controllers\AplikasiTicketProsesController;
use App\Http\Controllers\KategorimasalahController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KipController;

Route::get('/', function () {
    return view ('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/dashboard', function () {
        // Redirect user based on usertype
        $user = auth()->user();
        if ($user->usertype === 'client'){
        return view('clientdashboard');
        }elseif($user->division_id == 1) {
        return redirect()->intended(route('aplikasi.dashboard'));
         }elseif($user->division_id == 2) {
        return redirect()->intended(route('ID.dashboard'));
        }
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/aplikasi/dashboard',[AplikasiController::class, 'ticket'])->name('aplikasi.dashboard');
    Route::get('ID/dashboard',[InfrastrukturDigitalController::class, 'index'])->name('ID.dashboard');
    Route::get('KIP/dashboard', [KipController::class, 'index'])->name('KIP.dashboard');
    Route::get('aplikasi/ticket_open',[AplikasiController::class, 'index'])->name('aplikasi.ticket_open');
    Route::get('/clientdashboard', [ClientController::class, 'index'])->name('clientdashboard')->middleware('auth');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('aboutus', [AboutUSController::class, 'index'])->name('aboutus');
    });

Route::middleware([])->group(function () {
    Route::get('tickets', [TicketController::class, 'create'])->name('tickets');
    Route::post('tickets', [TicketController::class, 'store']);
    Route::get('ticket', [TicketController::class, 'index'])->name('ticket'); // Menggunakan 'ticket' sebagai nama rute
    Route::get('ticketopen', [TicketController::class, 'showOpenTickets'])->name('ticketopen');
    Route::get('ticket/client', [TicketController::class, 'indexForClient'])->name('ticketclient'); // Menggunakan 'ticket' sebagai nama rute
    Route::get('ticketproses', [TicketProsesController::class, 'index'])->name('ticketproses');
    Route::post('ticket/proses/{id}', [TicketProsesController::class, 'proses'])->name('ticket.proses');
    Route::get('ticketclosed', [TicketProsesController::class, 'closed'])->name('ticketclosed');
    Route::post('/ticket/close/{id}', [TicketProsesController::class, 'close'])->name('ticket.closed');
    Route::get('dataclient', [AdminAllUserController::class, 'index'])->name('dataclient');
    Route::get('rekap-ticket', [TicketController::class, 'rekapTicketPage'])->name('rekap_ticket');
    Route::get('tickets/export', [TicketController::class, 'export'])->name('tickets.export');
    Route::get('aplikasi/ticket_open',[AplikasiTicketProsesController::class, 'open'])->name('aplikasi.ticket_open');
    Route::get('aplikasi/ticket_proses',[AplikasiTicketProsesController::class, 'prosess'])->name('aplikasi.ticket_proses');
    Route::post('aplkiasi/ticket_proses{id}',[AplikasiTicketProsesController::class, 'proses'])->name('aplikasi.ticket_proses.proses');
    Route::get('aplikasi/ticket_show/{id}', [AplikasiTicketProsesController::class, 'show'])->name('aplikasi.ticket_show');
    Route::get('aplikasi/ticket_closed', [AplikasiTicketProsesController::class, 'closed'])->name('aplikasi.ticket_closed');
    Route::get('aplikasi/close/{id}', [AplikasiTicketProsesController::class, 'showCloseForm'])->name('aplikasi.ticket_closed.form');
    Route::post('aplikasi/ticket_close/{id}', [AplikasiTicketProsesController::class, 'close'])->name('aplikasi.ticket_close.close');
    Route::get('ID/ticket_open',[InfrastrukturDigitalController::class, 'open'])->name('ID.ticket_open');
    Route::get('ID/ticket_proses',[InfrastrukturDigitalController::class, 'prosess'])->name('ID.ticket_proses');
    Route::post('ID/ticket_proses{id}',[InfrastrukturDigitalController::class, 'proses'])->name('ID.ticket_proses.proses');
    Route::get('ID/ticket_show/{id}', [InfrastrukturDigitalController::class, 'show'])->name('ID.ticket_show');
    Route::get('ID/close/{id}', [InfrastrukturDigitalController::class, 'showCloseform'])->name('ID.ticket_closed.form');
    Route::get('ID/ticket_closed', [InfrastrukturDigitalController::class, 'closed'])->name('ID.ticket_closed');
    Route::get('/tickets/close/{id}', [InfrastrukturDigitalController::class, 'showCloseForm'])->name('ID.ticket_close.form');
    Route::post('ID/ticket_close/{id}', [InfrastrukturDigitalController::class, 'close'])->name('ID.ticket_close.close');
    Route::get('KIP/ticket_open', [KipController::class, 'open'])->name('KIP.ticket_open');
    Route::get('KIP/ticket_proses', [KipController::class, 'prosess'])->name('KIP.ticket_proses');
    Route::post('KIP/ticket_proses{id}', [KipController::class, 'proses'])->name('KIP.ticket_proses.proses');
    Route::get('KIP/ticket_show/{id}', [KipController::class, 'show'])->name('KIP.ticket_show');
    Route::get('KIP/ticket_closed', [KipController::class, 'closed'])->name('KIP.ticket_closed');
    Route::get('/tickets/close/{id}', [KipController::class, 'showCloseForm'])->name('KIP.ticket_close.form');
    Route::post('KIP/ticket_close/{id}', [KipController::class, 'close'])->name('KIP.ticket_close.close');
});

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticketshow');
Route::get('/ticket/client', [TicketController::class, 'indexForClient'])->name('ticketclient'); // Menggunakan 'ticket' sebagai nama rute
Route::resource('kategorimasalah', KategoriMasalahController::class);
Route::resource('divisions', DivisionsController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('datapengguna', DataPenggunaController::class);






require __DIR__.'/auth.php';
