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
}
