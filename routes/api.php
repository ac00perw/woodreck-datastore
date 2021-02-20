<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('states', function() {
    $states = \App\Models\State::select('id', 'abbrev', 'name')->get();
    return $states;
});

Route::get('snap', function() {
    $data = \App\Models\Snap::select('id', 'state_id', 'ppl_snap_sept_2019')
    // ->with(array('state'=>function($query){
    //     $query->select('id','name');
    // }))
        ->get();
    return $data;
});

Route::get('homesless-pop', function() {
    $data = \App\Models\Homeless::select('state_id', 'homeless_pop')
    // ->with(array('state'=>function($query){
    //     $query->select('id','name');
    // }))
    
        ->get();
    return $data;
});

Route::get('student-loan-debt', function() {
    return \App\Models\StudentLoans::get();
});