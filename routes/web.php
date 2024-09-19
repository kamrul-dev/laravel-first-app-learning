<?php

use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\InvokController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    // dd(app());
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
// Route::get('/contact', function () {
//     // return view('/contact');
//     return redirect ('/about');

// });

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


// add middleware in coutry route
// Route::get('/country', function () {
//     return view('/country');
// })->middleware('country');


//__Invokable Route__//
Route::get('/testInvoke', InvokController::class);


// view route with controller:  req -> route -> Controller -> return view -> response
Route::get('/withController-ddd', [FirstController::class,'index'])->name('withController.us');


// Controller Middleware
Route::get('/country', [FirstController::class,'country'])->name('country.us')->middleware('country');


// CSRF token used
Route::post('/student/store', [FirstController::class,'Studentstore'])->name('student.store');

Route::post('/store/contact', [FirstController::class,'store'])->name('store.contact');

Route::get('/laravelview', [FirstController::class,'viewlaravel'])->name('laravel.view');

Route::get('/testsession', function(Request $request){
    $request->session()->put('age', '24');
    // session(['name' => 'Kamrul_Session']);

});

Route::get('/all', function(Request $request){
    return $request->session()->all();
    // $request->session()->flush();

});

//print loginfo
Route::get('/loginfo', function(Request $request){
   Log::info('This is your age'.rand(1,30));

//    return redirect()->to('/');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; 
