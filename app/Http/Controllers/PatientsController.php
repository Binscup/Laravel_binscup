<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hospital_id = $request->get('hospital_id');
        $hospitals = Hospital::all();
        $patients = Patient::with('hospital')
            ->when($hospital_id, fn($q) => $q->where('hospital_id', $hospital_id))
            ->get();

        return view('patients.index', compact('patients', 'hospitals', 'hospital_id'));
    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('patients.create', compact('hospitals'));
    }

    public function store(Request $request)
    {
        Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patients.edit', compact('patient', 'hospitals'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return response()->json(['success' => true]);
    }
}
