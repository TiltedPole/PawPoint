<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            "loginEmail" => "required|email",
            "loginPassword" => "required"
        ], [
            'loginEmail.required' => 'The email is required.',
            'loginEmail.email' => 'Please enter a valid email address.',
            'loginPassword.required' => 'The password is required.',
        ]);

        if (auth()->attempt(["email" => $incomingFields["loginEmail"],  "password" => $incomingFields["loginPassword"]])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if (Auth::user()->type == "admin") {
                return redirect("/admin-dashboard");
            } else {
                return redirect("/dashboard");
            }
        } else {
            return redirect("/")->with('error', 'Invalid email or password.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect("/");
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            "first_name" => ["required", "min:2", "max:30"],
            "last_name" => ["required", "min:2", "max:30"],
            "email" => ["required", "email", Rule::unique("users", "email")->ignore(auth()->user()->id ?? null)],
            "phone" => ["required", "min:10", "regex:/^[0-9]{10}$/"],
            "password" => ["required", "min:8", "max:200", "regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+])[A-Za-z0-9!@#$%^&*()_+]+$/"],
            "type" => ["required", Rule::in(['client', 'admin'])],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.min' => 'The first name must be at least 2 characters.',
            'last_name.required' => 'The last name is required.',
            'first_name.min' => 'The last name must be at least 2 characters.',
            'email.unique' => 'The email address is already in use.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'The phone number is required.',
            'phone.unique' => 'Please enter a valid phone number',
            'password.regex' => 'The password must contain at least one capital letter, one number, and one special character',
        ]);

        $incomingFields["password"] = bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        auth()->login($user);
        if ($user) {
            return redirect("/admin-dashboard")->with('success', 'User registered successfully.');
        } else {
            return back()->with('error', 'Failed to create user. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        $incomingFields = $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:30'],
            'last_name' => ['required', 'string', 'min:2', 'max:30'],
            'phone' => ['required', 'string', 'min:10', 'regex:/^[0-9]{10}$/'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'county' => ['required', 'string', 'max:255'],
            'eircode' => ['required', 'string', 'max:10'],
        ], [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.min' => 'The first name must be at least 2 characters.',
            'first_name.max' => 'The first name may not be greater than 30 characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.min' => 'The last name must be at least 2 characters.',
            'last_name.max' => 'The last name may not be greater than 30 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.string' => 'The phone number must be a string.',
            'phone.min' => 'The phone number must be at least 10 digits.',
            'phone.regex' => 'Please enter a valid phone number.',
            'address_line_1.required' => 'The address line 1 is required.',
            'address_line_1.string' => 'The address line 1 must be a string.',
            'address_line_1.max' => 'The address line 1 may not be greater than 255 characters.',
            'address_line_2.string' => 'The address line 2 must be a string.',
            'address_line_2.max' => 'The address line 2 may not be greater than 255 characters.',
            'city.required' => 'The city is required.',
            'city.string' => 'The city must be a string.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'county.required' => 'The county is required.',
            'county.string' => 'The county must be a string.',
            'county.max' => 'The county may not be greater than 255 characters.',
            'eircode.required' => 'The eircode is required.',
            'eircode.string' => 'The eircode must be a string.',
            'eircode.max' => 'The eircode may not be greater than 10 characters.',
        ]);

        $user = User::find($id);
        $user->first_name = $incomingFields['first_name'];
        $user->last_name = $incomingFields['last_name'];
        $user->phone = $incomingFields['phone'];

        if ($user->address) {
            $address = $user->address;
            $address->address_line_1 = $incomingFields['address_line_1'];
            $address->address_line_2 = $incomingFields['address_line_2'];
            $address->city = $incomingFields['city'];
            $address->county = $incomingFields['county'];
            $address->eircode = $incomingFields['eircode'];
            $address->save();
        }else{
            $user->address()->create([
                'address_line_1' => $incomingFields['address_line_1'],
                'address_line_2' => $incomingFields['address_line_2'],
                'city' => $incomingFields['city'],
                'county' => $incomingFields['county'],
                'eircode' => $incomingFields['eircode'],
                'addressable_type' => get_class(Auth::user()),
            ]);
        }

        $user->save();

        if ($user->save()) {
            return redirect('/profile')->with('success', 'User updated successfully');
        } else {
            return redirect('/profile')->with('error', 'User update failed');
        }
    }

    public function clinicSignUp(Request $request, $clinicId)
    {
        $request->validate([
            'clinic_id' => 'required|exists:clinics,id',
        ]);
        $user = User::find(Auth::user()->id);

        $clinicId = $request->input('clinic_id');

        $user->clinic_id = $clinicId;
        $user->save();

        if ($user->save()) {
            return redirect('/dashboard')->with('success', 'You have successfully signed up to a clinic');
        } else {
            return redirect('/dashboard')->with('error', 'Clinic sign up failed');
        }
    }

    public function leaveClinic(Request $request, $id){

        $user = User::find($id);
        $user->clinic_id = null;
        $user->save();

        if ($user->save()) {
            return redirect('/dashboard')->with('success', 'You have successfully signed out of a clinic');
        } else {
            return redirect('/dashboard')->with('error', 'Clinic sign out failed');
        }
    }

    public function removeFromClinic(Request $request, $id){

        $user = User::find($id);
        $user->clinic_id = null;
        $user->save();

        if ($user->save()) {
            return redirect('/dashboard')->with('success', 'You have successfully removed a client from your clinic');
        } else {
            return redirect('/dashboard')->with('error', 'Client removal failed');
        }
    }
}
