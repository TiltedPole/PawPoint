<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClinicController extends Controller
{
    public function register(Request $request)
    {
        Log::debug('INSIDE OF REGISTER');
        $incomingFields = $request->validate([
            "name" => ["required", "min:2", "max:30"],
            "phone" => ["required", "min:10", "regex:/^[0-9]{10}$/"],
            "email" => ["required", "email", "unique:clinics,email"],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'county' => ['required', 'string', 'max:255'],
            'eircode' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'name.max' => 'The name may not be greater than 30 characters.',
            'email.unique' => 'The email address is already in use.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'The phone number is required.',
            'phone.unique' => 'Please enter a valid phone number',
        ]);
        Log::debug('VALIDATION PASSED');

        $incomingFields['admin_id'] =  Auth::user()->id;
        Log::debug('ADMIN ID FOUND');

        Log::debug(get_class(Auth::user()));

        $user = User::find($incomingFields['admin_id']);
        $user->address()->create([
            'address_line_1' => $incomingFields['address_line_1'],
            'address_line_2' => $incomingFields['address_line_2'],
            'city' => $incomingFields['city'],
            'county' => $incomingFields['county'],
            'eircode' => $incomingFields['eircode'],
            'addressable_type' => get_class(Auth::user()),
        ]);
        Log::debug('ADDRESS CREATED');

        Log::debug('Creating clinic with data: ' . print_r($incomingFields, true));

        $clinic = Clinic::create($incomingFields);
        Log::debug('CLINIC CREATED');

        if ($clinic) {
            return redirect("/admin-dashboard")->with('success', 'Clinic registered successfully.');
        } else {
            return redirect("/clinic-register")->with('error', 'Failed to add clinic. Please try again.');
        }
    }



    public function update(Request $request, $id)
    {
        Log::debug('INSIDE OF UPDATE');
        $incomingFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'county' => ['required', 'string', 'max:255'],
            'eircode' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
        ]);
        Log::debug('VALIDATION PASSED');

        $clinic = Clinic::find($id);
        Log::debug('CLINIC FOUND BY ID');

        if ($clinic->email !== $incomingFields['email'] && Clinic::where('email', $incomingFields['email'])->exists()) {
            return redirect()->back()->with('error', 'The email is already associated with another clinic.');
        }
        Log::debug('EMAIL CHECK PASSED');

        $clinic->name = $incomingFields['name'];
        $clinic->phone = $incomingFields['phone'];
        $clinic->email = $incomingFields['email'];

        $user = $clinic->admin;
        if ($user->address) {
            $address = $user->address;
            $address->address_line_1 = $incomingFields['address_line_1'];
            $address->address_line_2 = $incomingFields['address_line_2'];
            $address->city = $incomingFields['city'];
            $address->county = $incomingFields['county'];
            $address->eircode = $incomingFields['eircode'];
            $address->save();
        }
        Log::debug('ADDRESS SAVED');

        $clinic->save();
        Log::debug('CLINIC SAVED');

        if ($clinic->wasChanged() || ($user->address && $user->address->wasChanged())) {
            return redirect('/clinic')->with('success', 'Clinic updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update pet. Please try again.');
        }
    }


    // public function delete(Request $request, $id)
    // {
    //     $clinic = Clinic::find($id);

    //     if (!$clinic) {
    //         return redirect()->back()->with('error', 'Clinic not found.');
    //     }

    //     try {
    //         $clinic->delete();
    //         return redirect()->back()->with('success', 'Clinic deleted successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to delete clinic. Please try again.');
    //     }
    // }
}
