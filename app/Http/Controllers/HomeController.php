<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            $thisStat = auth()->user()->is_admin;
            if($thisStat == 1){
                return redirect("/staff");
            }else{
                return redirect("/applicant");
            }
        }else{
            return redirect()->guest('login');
        }
    }
}
