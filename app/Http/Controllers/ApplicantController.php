<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Residence;
use App\User;
use App\Applicant;
use Illuminate\Support\Facades\Hash;

class ApplicantController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$thisApplicant = Auth::user()->username;
    	#dd($thisApplicant);
    	$AllResidences = Residence::all();
    	
    	return view('application/index', compact('thisApplicant', 'AllResidences'));
    }

    public function newApplicant(Request $Request)
    {
        $newUser = new User;

        $newUser->fullname = $Request['fullname'];
        $newUser->username = $Request['username'];
        $newUser->password = Hash::make($Request['password']);
        $newUser->is_admin = 0;
        
        try{
            $newUser->save();

            $thisApplicant = new Applicant;
            $thisApplicant->user_id = $newUser->id;
            $thisApplicant->email = $Request->email;
            $thisApplicant->monthlyIncome = $Request->monthlyIncome;
            $thisApplicant->save();

            return redirect('/');
        }catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
