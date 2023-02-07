<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Symfony\Component\HttpFoundation\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [MainController::class,'index'])->name('main.index');

Route::get('/response-sample', function () {
    return response('<h1>This is sample of response</h1>');
});

//wildcard
// Route::get('/sample/{id}', function ($id) {
//     return response('Post '.$id);
// });

//wildcard w/ constraint
Route::get('/sample/{id}', function ($id) {
    return response('Post '.$id);
})->where('id','[0-9]+');

//Request & Query Params
Route::get('/search', function (Request $request) {
    // ddd($request);
    // dd($request);
    return ($request->name.' '.$request->pet);
});

