<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Residence;

class ResidenceController extends Controller
{
	public function store(Request $request)
	{
		$validatedData = $request->validate([
            'address' => 'required|max:255',
            'numUnits' => 'required|numeric',
            'sizePerUnit' => 'required',
            'monthlyRental' => 'required',
        ]);
        Residence::create($validatedData);

        return redirect('/viewResidence');
	}

    public function viewResidence()
    {
        $AllResidences = Residence::all();

     	return view('viewResidence', compact('AllResidences'));
    }

    public function editResidence($id)
    {
        $ThisResidences = Residence::findOrFail($id);

     	return view('FormResidence', compact('ThisResidences'));
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

        return redirect('/viewResidence');
    }
}
