<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{shorturl}', [ UrlController::class, 'show' ]);
Route::post('/', [ UrlController::class, 'store' ]);

Route::get('/statistics/urls', [ VisitController::class, 'urls' ]);
Route::get('/statistics/visits/{shorturl}', [ VisitController::class, 'visits' ]);

