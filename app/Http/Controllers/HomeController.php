<?
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the dashboard based on user type and division.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->usertype == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->usertype == 'petugas') {
            return redirect()->route('petugas.dashboard', ['division' => $user->divisions_id]);
        } elseif ($user->usertype == 'client') {
            return redirect()->route('client.dashboard',);
        } else {
            return redirect('/'); // Or any default route
        }
    }
}
