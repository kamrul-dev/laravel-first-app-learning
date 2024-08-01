<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


//routes --> web.php
Route::get('/test', function () {
    app()->make('first_service_helper');
    return view('welcome');
});

//route for facades
Route::get('/testone', function () {
    CustomFacadeTest::Test();

});

// routing implement for about and contact page
// Route::get('/about', function () {
//     return view('/about');
// });

Route::view('/about','about');

// Route::get('/about', function () {
//     return view('/about');
// });

Route::get('/contact', function () {
    return view('/contact');
});

//redirect one rout to another if router not present : when click contact route it will go to about route
Route::get('/contact', function () {
    // return view('/contact');
    return redirect ('/about');

});

// route parameter
Route::get('/routparameter/{id}', function ($id) {
    // return 'This is my route parameter id = ' .$id;
    return "This is my route parameter = $id";
});

Route::get('/contact-this-is-named-parameter', function () {
    return view('/contact');
})->name('contact.us');

Route::get(md5('/parametermd5hashing-afsd33d'), function () {
    return view('/contact');
})->name('contact.us.md5');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
