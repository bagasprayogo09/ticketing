<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class AdminAllUserController extends Controller
{
    public function index()
    {
        $allUsers = User::where('usertype', 'client')->get();
        return view('dataclient', compact('allUsers'));
    }
}
