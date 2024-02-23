<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Str;




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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->prefix('students')->group(function () {
    Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/{id}/update', [StudentsController::class, 'update'])->name('students.update');
    Route::get('/{id}/delete', [StudentsController::class, 'destroy'])->name('students.destroy');
    Route::get('/{id}/{name?}', [StudentsController::class, 'details'])->name('students.details');
    Route::get('/', [StudentsController::class, 'index'])->name('students.index');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// oauth github
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    
    $user = User::where('email', $githubUser->getEmail())
        ->first();

    if (!$user) {
        // User does not exist, create a new user record
        $user = User::create([
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'user_id' => $githubUser->getId(),
            'password' => bcrypt(Str::random(12)), // Generate a random password
        ]);
    }
    // else {
    //     // User exists, update their information (if necessary)
    //     $user->update([
    //         'name' => $githubUser->getName(),
    //         'email' => $githubUser->getEmail(),
    //     ]);
    // }

    // Log the user in
    auth()->login($user);
    return redirect()->route('home');
});




// oauth google
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    // dd($user);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');