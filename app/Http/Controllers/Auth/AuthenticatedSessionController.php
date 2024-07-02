<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
   public function create(Request $request): View
    {
        // menggunakan parameter query 'type' untuk menentukan tampilan
        $type = $request->query('usertype');


        if ($type === 'admin') {
            return view('auth.login');
        }else
            return view('auth.login');

    }
            public function showClientLoginForm(): View
            {
                return view('auth.clientlogin');
            }

            public function showPetugasLoginForm(): View
            {
                return view('auth.petugasloginn');
            }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Dapatkan pengguna yang sudah terautentikasi
        $user = Auth::user();
        if ($user->usertype == 'admin') {
        Alert::success('Selamat Login Telah Berhasil', 'Selamat Datang Di Dashboard');
        return redirect()->intended(route('dashboard'));
        }elseif ($user->usertype =='client'){
        Alert::success('Selamat Login Telah Berhasil', 'Selamat Datang Di Dashboard');
        return redirect()->intended(route('clientdashboard'));
        } elseif ($user->division_id == 1) {
        Alert::success('Selamat Login Telah Berhasil', 'Selamat Datang Di Dashboard');
        return redirect()->intended(route('aplikasi.dashboard'));
        } elseif ($user->division_id == 2) {
        Alert::success('Selamat Login Telah Berhasil', 'Selamat Datang Di Dashboard');
        return redirect()->intended(route('ID.dashboard'));
        } elseif ($user->division_id == 3) {
        Alert::success('Selamat Login Telah Berhasil', 'Selamat Datang Di Dashboard');
        return redirect()->intended(route('KIP.dashboard'));
    }else
    return redirect('/');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
