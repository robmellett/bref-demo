<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
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

Route::get('cache', function () {

    $cached = Cache::remember('cache-test', 10, function () {
        return Carbon::now();
    });

    return response()->json([
        "cached" =>  $cached->diffForHumans(),
        "now" => Carbon::now()->diffForHumans()
    ]);
});
