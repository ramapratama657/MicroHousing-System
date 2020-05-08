<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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

        return redirect('residence/view');
	}

    public function viewResidence()
    {
        $AllResidences = Residence::all();

     	return view('residence/view', compact('AllResidences'));
    }

    public function editResidence($id)
    {
        $ThisResidence = Residence::findOrFail($id);

     	return view('residence/formEdit', compact('ThisResidence'));
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
