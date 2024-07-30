<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//create route: routes --> amar.php
Route::get('/amar', function () {
    return view('amar');
});


