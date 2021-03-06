<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

//display file uploading form
Route::get('file-upload', [FileController::class, 'index']);
//store files in database
Route::post('save-file-upload', [FileController::class, 'fileStore']);
//delete file
Route::get('delete-file/{id}', [FileController::class, 'deleteFile']);
//search
Route::get('file-search', [FileController::class, 'search']);
