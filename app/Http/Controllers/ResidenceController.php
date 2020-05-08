<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Applicant;
use App\Residence;
use App\Application;
use App\Allocation;
use App\Unit;
use DateTime;

class ResidenceController extends Controller
{
    public function viewAllocation($id)
    {
        # code...
        $thisApplicant = Auth::user()->username;

        //search

        $ThisAllocation = Allocation::where('application_id',$id);
        return view('residence/allocation', compact('ThisAllocation','thisApplicant'));
    }

    public function formResidence()
    {
        $thisApplicant = Auth::user()->username;
        return view('residence/form',compact('thisApplicant'));
    }

	public function store(Request $request)
	{

        $newRes = new Residence;
        $newRes->address = $request->address;
        $newRes->numUnits = $request->numUnits;
        $newRes->sizePerUnit = $request->sizePerUnit;
        $newRes->monthlyRental = $request->monthlyRental;
        
    	try{
            $newRes->save();
        }catch (Throwable $e) {
            report($e);
            return false;
        }

    	$this->validate($request, [
        'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);

            $UpdateThis = Residence::where('id',$newRes->id)->first();
            $UpdateThis->img = $name;
            try{
                $UpdateThis->save();
            }catch (Throwable $e) {
                report($e);

                return false;
            }
        }

        return redirect('residence/view');
	}

    public function viewResidence()
    {
        $AllResidences = Residence::all();
        $thisApplicant = Auth::user()->username;
     	return view('residence/view', compact('AllResidences','thisApplicant'));
    }

    public function editResidence($id)
    {
        $ThisResidence = Residence::findOrFail($id);

        $thisApplicant = Auth::user()->username;
     	return view('residence/formEdit', compact('ThisResidence','thisApplicant'));
    }

    public function storeEdit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'address' => 'required|max:255',
            'numUnits' => 'required|numeric',
            'sizePerUnit' => 'required',
            'monthlyRental' => 'required',
        ]);
        
        Residence::whereId($id)->update($validatedData);

        return redirect('residence/view');
    }

    public function seeApplication($id)
    {
	    //select application with residence id
	    $AllApplication = Application::where('residence_id',$id)->get();
        $thisApplicant = Auth::user()->username;
	    return view('residence/application', compact('AllApplication','thisApplicant'));
    }

    public function progApprove($id, Request $request)
    {
        $thisApplication = Application::where('id',$id)->first();
        $thisResidence = Residence::where('id',$thisApplication->residence_id)->first();
        $units = Residence::find($thisApplication->residence_id)->unit->count();
        if($units<$thisResidence->numUnits){
            $newUnit = new Unit;
            $newUnit->unitNo = $units+1;
            $newUnit->availability = $thisResidence->sizePerUnit - 1;
            $newUnit->residence_id = $thisApplication->residence_id;
            
            try{
                $newUnit->save();
            }catch (Throwable $e) {
                report($e);
                return false;
            }

            $newAllocation = new Allocation;
            $newAllocation->application_id = $id;
            $newAllocation->unit_id = $newUnit->id;
            $newAllocation->fromDate = new DateTime($request->fromDate);
            $newAllocation->endDate = new DateTime($request->endDate);

            $fdate = $request->fromDate;
            $tdate = $request->endDate;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');//now do whatever you like with $days
            $newAllocation->duration = $days;

            try{
                $newAllocation->save();
            }catch (Throwable $e) {
                report($e);
                return false;
            }

            $thisApplication = Application::where('id',$id)->first();
            $thisApplication->Status = "Approved";
            try{
                $thisApplication->save();
            }catch (Throwable $e) {
                report($e);

                return false;
            }
            return redirect('/residence/'.$thisApplication->residence_id);
        }
    }

    public function applicationApprove($id)
    {
        $thisApplicant = Auth::user()->username;
        return view('residence/formAllocation', compact('thisApplicant','id'));
    }

    public function applicationDecline($id)
    {
        # code...
        $thisApplication = Application::where('id',$id)->first();
        $thisApplication->Status = "Decline";
        try{
            $thisApplication->save();
        }catch (Throwable $e) {
            report($e);

            return false;
        }
        return redirect('/residence/'.$thisApplication->residence_id);
    }
}
