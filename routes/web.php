<?php

use Illuminate\Support\Facades\Route;
use App\Models\media;

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
    $media =  media::where('base64',null)->orderBy('id', 'desc')->paginate(30);
    $mediacrop = media::where('image',null)->get();
    return view('index', compact('media','mediacrop'));
});


include __DIR__ . '/routes/media.php';