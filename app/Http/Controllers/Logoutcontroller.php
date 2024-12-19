<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logoutcontroller extends Controller
{
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','Logout successful')

        // ->withHeaders([
        //     'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        //     'Pragma' => 'no-cache',
        //     'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT',
        // ]);
        
        
        ;
    }
}
