<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\MessageController;
use App\Models\Clinic;
use App\Models\Message;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes accessible to unauthenticated user
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
    })->name('register.view');

    Route::get('/login', function () {
        return view('login');
    })->name('login.view');

    Route::post("/register", [UserController::class, "register"]);
    Route::post("/login", [UserController::class, "login"]);
});

// Routes accessable to authenticated user
Route::middleware(['auth'])->group(function () {

    Route::middleware(['ensure.clinic.form.filled'])->group(function () {

        Route::get('/admin-dashboard', function () {
            if (Auth::user()->type === 'client') {
                $patients = Patient::where('owner_id', Auth::user()->id)->get();
                if (Auth::user()->clinic_id != null) {
                    $clinic = Clinic::where('id', Auth::user()->clinic_id)->get();
                    $messages = Message::where('sender_id', Auth::user()->id)->orWhere('recipient_id', Auth::user()->id)->get();
                    return view('dashboard', ['patients' => $patients], ['clinic' => $clinic], ['messages' => $messages]);
                }
                return view('dashboard', ['patients' => $patients]);
            } else {
                $users = User::where('clinic_id', Auth::user()->clinic->id)->get();
                $messages = Message::where('sender_id', Auth::user()->id)
                    ->orWhere('recipient_id', Auth::user()->id)
                    ->get();
                return view('admin-dashboard', [
                    'users' => $users,
                    'messages' => $messages
                ]);
            }
        })->name('admin-dashboard.view');

        Route::get('/dashboard', function () {
            if (Auth::user()->type === 'admin') {
                $users = User::where('clinic_id', Auth::user()->clinic->id)->get();
                $messages = Message::where('sender_id', Auth::user()->id)
                    ->orWhere('recipient_id', Auth::user()->id)
                    ->get();
                return view('admin-dashboard', [
                    'users' => $users,
                    'messages' => $messages
                ]);
            } else {
                $patients = Patient::where('owner_id', Auth::user()->id)->get();
                if (Auth::user()->clinic_id != null) {
                    $clinic = Clinic::where('id', Auth::user()->clinic_id)->first();
                    $messages = Message::where('sender_id', Auth::user()->id)
                        ->orWhere('recipient_id', Auth::user()->id)
                        ->get();
                    return view('dashboard', [
                        'patients' => $patients,
                        'clinic' => $clinic,
                        'messages' => $messages
                    ]);
                }
                return view('dashboard', ['patients' => $patients]);
            }
        })->name('dashboard.view');

        Route::get('/profile', function () {
            return view('profile');
        })->name('profile.view');

        Route::get('/clinic', function () {
            return view('clinic');
        })->name('clinic.view');

        Route::put('/removeFromClinic/{id}', [UserController::class, 'removeFromClinic']);
    });

    Route::get('/client-details/{id}', function () {
        return view('client-details');
    })->name('client-details.view');

    Route::get('/clinic-register', function () {
        return view('clinic-register');
    })->name('clinic.register.view');

    Route::get('/clinics', function () {
        $clinics = Clinic::all();
        return view('clinics', ['clinics' => $clinics]);
    })->name('clinics.view');

    Route::get('/appointments', function () {
        return view('appointments');
    })->name('appointments.view');

    Route::post('/clinic-sign-up/{id}', [UserController::class, 'clinicSignUp']);
    Route::put('/leaveClinic/{id}', [UserController::class, 'leaveClinic']);

    // User Routes
    Route::post('/logout', [UserController::class, 'logout']);
    Route::put('/editDetails/{id}', [UserController::class, 'update']);
    Route::delete('/deleteUser/{id}', [UserController::class, 'delete']);

    // Patient Routes
    Route::post('/register/{id}', [PatientController::class, 'register']);
    Route::put('/updatePatient/{id}', [PatientController::class, 'update']);
    Route::delete('/deletePatient/{id}', [PatientController::class, 'delete']);

    // Clinic Routes
    Route::post('/clinic-register', [ClinicController::class, 'register']);
    Route::put('/updateClinic/{id}', [ClinicController::class, 'update']);
    // Route::delete('/deleteClinic/{id}', [ClinicController::class, 'delete']);

    // Message Routes
    Route::post('/sendMessage', [MessageController::class, 'sendMessage']);
});

Route::redirect('/', '/dashboard')->middleware('auth');
