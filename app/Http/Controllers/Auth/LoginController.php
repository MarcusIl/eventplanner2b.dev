<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = '/';
    }

    protected function authenticated(Request $request, $user)
    {
        $previousUrl = Session::get('previous_url');
        if ($previousUrl) {
            Session::forget('previous_url');
            return redirect($previousUrl);
        }
        return redirect()->intended($this->redirectPath());
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirect the user to the previous URL or a default path
        return redirect()->back()->with('success', 'You have been logged out.');
    }
}
