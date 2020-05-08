<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Residence;

class StaffController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$thisApplicant = Auth::user()->username;
    	#dd($thisApplicant);
    	$AllResidences = Residence::all();
    	
    	return view('admin', compact('thisApplicant', 'AllResidences'));
    }

    public function newStaff(Request $Request)
    {
        $newUser = new User;

        $newUser->fullname = $Request['fullname'];
        $newUser->username = $Request['username'];
        $newUser->email = $Request['email'];
        $newUser->password = Hash::make($Request['password']);
        $newUser->is_admin = 1;
        
        try{
            $newUser->save();

            $newAdmin = new Admin;
            $newAdmin->user_id = $newUser->id;
            $newAdmin->save();

            return redirect('/');
        }catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
