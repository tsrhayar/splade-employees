<?php

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/states/{state_id}', function ($state_id) {
    $country = Country::findOrFail($state_id);

    return response()->json($country->states);
});

Route::get('/cities/{city_id}', function ($state_id) {
    $states = State::findOrFail($state_id);

    return response()->json($states->cities);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
