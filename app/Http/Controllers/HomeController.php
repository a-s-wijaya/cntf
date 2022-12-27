<?php

namespace App\Http\Controllers;

use App\Models\SdgsList;
use App\User;
use App\Models\SdgsMaster;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sdgs = SdgsMaster::all();
        return view('home', compact('sdgs'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        $sdgLists = $user->sdgs()->with('emission')->get();

        return view('profile', compact('user', 'sdgLists'));
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        auth()->logout();
        return redirect()->route('login')->with('success', 'Profile updated successfully');
    }
}
