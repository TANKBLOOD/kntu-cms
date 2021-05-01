<?php

use App\Http\Controllers\CvCategoryController;
use App\Http\Controllers\CvController;
use App\Models\CvCategory;
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
Route::get('/cvConfig', function() {
    return view('cv-config.config-page');
});
Route::post('/pCatAjax', [CvCategoryController::class, 'createPcatAjax'])->name('pCat.create');
Route::post('/catAjax', [CvCategoryController::class, 'createCatAjax'])->name('cat.create');

// Route::post('/cvAjax', [CvController::class, 'createCvajax'])->name('cv.create');
