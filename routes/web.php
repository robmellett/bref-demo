<?php

use Illuminate\Support\Carbon;
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

Route::get('cache', function () {
    $cached = Cache::remember('cache-test', 10, function () {
        return Carbon::now();
    });

    return response()->json([
        "cached" => $cached->diffForHumans(),
        "now" => Carbon::now()->diffForHumans()
    ]);
});
