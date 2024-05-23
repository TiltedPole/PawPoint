<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            "name" => ["required", "min:2", "max:30"],
            "species" => ["required", Rule::in(['Dog', 'Cat', 'Bird', 'Fish'])],
            "breed" => ["required", Rule::in(['Labrador', 'Poodle', 'Siamese', 'Persian', 'Parrot', 'Goldfish'])],
            "sex" => ["required", Rule::in(['Male', 'Female'])],
            "age" => ["required", "integer", "min:1", "max:100"],
            "weight" => ["required", "numeric", "min:1", "max:500"],
        ], [
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'name.max' => 'The name may not be greater than 30 characters.',
            'species.required' => 'The species is required.',
            'species.in' => 'Please select a valid species.',
            'breed.required' => 'The breed is required.',
            'breed.in' => 'Please select a valid breed.',
            'sex.required' => 'The sex is required.',
            'sex.in' => 'Please select a valid sex.',
            'age.required' => 'The age is required.',
            'age.integer' => 'The age must be an integer.',
            'age.min' => 'The age must be at least 1.',
            'age.max' => 'The age may not be greater than 100.',
            'weight.required' => 'The weight is required.',
            'weight.numeric' => 'The weight must be a number.',
            'weight.min' => 'The weight must be at least 1.',
            'weight.max' => 'The weight may not be greater than 500.',
        ]);
        $incomingFields['owner_id'] =  Auth::user()->id;

        $patient = Patient::create($incomingFields);
        if ($patient) {
            return redirect("/dashboard?openSection=manage-pets")->with('success', 'Pet registered successfully.');
        } else {
            return back()->with('error', 'Failed to add patient. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'species' => ['required', 'string', 'max:255'],
            'breed' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'in:Male,Female'],
            'age' => ['required', 'numeric', 'min:0'],
            'weight' => ['required', 'numeric', 'min:0'],
        ], [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'species.required' => 'The species is required.',
            'species.string' => 'The species must be a string.',
            'species.max' => 'The species may not be greater than 255 characters.',
            'breed.required' => 'The breed is required.',
            'breed.string' => 'The breed must be a string.',
            'breed.max' => 'The breed may not be greater than 255 characters.',
            'sex.required' => 'The sex is required.',
            'sex.string' => 'The sex must be a string.',
            'sex.in' => 'Invalid value for sex.',
            'age.required' => 'The age is required.',
            'age.numeric' => 'The age must be a number.',
            'age.min' => 'The age must be at least 0.',
            'weight.required' => 'The weight is required.',
            'weight.numeric' => 'The weight must be a number.',
            'weight.min' => 'The weight must be at least 0.',
        ]);

        $patient = Patient::find($id);
        $patient->name = $incomingFields['name'];
        $patient->species = $incomingFields['species'];
        $patient->breed = $incomingFields['breed'];
        $patient->sex = $incomingFields['sex'];
        $patient->age = $incomingFields['age'];
        $patient->weight = $incomingFields['weight'];

        $patient->save();

        if ($patient->wasChanged()) {
            return redirect('/dashboard?openSection=manage-pets')->with('success', 'Pet updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update pet. Please try again.');
        }
    }


    public function delete(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found.');
        }

        try {
            $patient->delete();
            return redirect('/dashboard?openSection=manage-pets')->with('success', 'Patient deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete patient. Please try again.');
        }
    }
}
