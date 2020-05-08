<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Applicant;
use App\Residence;
use App\Application;
use App\User;
use App\Allocation;

class ApplicationController extends Controller
{
	public function viewAllocation($id)
	{
		# code...
		$thisApplicant = Auth::user()->username;
		$ThisAllocation = Allocation::where('application_id',$id)->get();

		return view('application/allocation', compact('ThisAllocation','thisApplicant'));
	}

	public function viewApplication()
	{
		if (Auth::check()) {
			$user_id = Auth::id();
			$Applicant_id = User::find($user_id)->isApplicant->id;
			//dd($Applicant_id);
			
			$AllApplication = Application::find($Applicant_id)->get();
			//dd($AllApplication);


    		$thisApplicant = Auth::user()->username;

			return view('application/view', compact('AllApplication','thisApplicant'));
		}else{
			return redirect("/");
		}
	}

	public function formApplication($id)
	{
		$Residence_id = $id;
		return view('application/form',compact('Residence_id'));
	}

	public function editApplication($id)
	{
		$ThisData = Application::findOrFail($id);
     		return view('residence/formEdit', compact('ThisData'));
	}

	public function viewResidence()
	{
		$AllResidences = Residence::all();
		$thisApplicant = Auth::user()->username;

     	return view('application/residence', compact('AllResidences','thisApplicant'));
	}

	public function newApplication(Request $request, $id)
	{
		$user_id = Auth::id();
		$Applicant_id = User::find($user_id)->isApplicant->id;
		//dd($Applicant_id);
		try {
        		// Validate the value...
				$newApplication = new Application;
				$newApplication->residence_id = $id;
				$newApplication->applicant_id = $Applicant_id;
	        	$newApplication->applicationDate = date("Y/m/d");
	        	$newApplication->requiredMonth = $request->requiredMonth;
	        	$newApplication->requiredYear = $request->requiredYear;
	        	$newApplication->status = "New Application";

	        	$newApplication->save();

    			return redirect('application/residence');
		} catch (Throwable $e) {
			report($e);

			return false;
		}
	}

	public function storeEdit(Request $request, $id)
	{
		if (Auth::check()) {
			$validatedData = $request->validate([
            		'applicationDate' => 'required',
            		'requiredMonth' => 'required',
            		'requiredYear' => 'required',
	        ]);
	        Application::whereId($id)->update($validatedData);

	        return redirect('application/residence');
		}else{
			return redirect("/");
		}
	}
}
