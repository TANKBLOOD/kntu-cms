<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CvCategoryController;
use App\Http\Controllers\CvConfigController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ParentCategoryController;
use App\Models\CvCategory;
use App\Models\ParentCategory;
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
Route::get('/cvConfig', [CvConfigController::class, 'displayCvConfigPage'])->name('config.display');
Route::post('/pCatAjax', [ParentCategoryController::class, 'createPcatAjax'])->name('pCat.create');
Route::post('/catAjax', [CvCategoryController::class, 'createCatAjax'])->name('cat.create');

Route::post('/cvAjax', [CvController::class, 'getCvsByCategoryAjax'])->name('cv.load');
Route::post('/createCvAjax', [CvController::class, 'createCvAjax'])->name('cv.create');

Route::delete('/deleteCvAjax', [CvController::class, 'removeCvAjax'])->name('cv.delete');

Route::get('/adminCvShow/{cv}', [CvController::class, 'adminShowCv'])->name('cv.admin.show');

Route::get('/editCv/{cv}', [CvController::class, 'edit'])->name('cv.edit');
Route::post('/updateComponentAjax', [ComponentController::class, 'updateComponentAjax'])->name('cv.update');
Route::delete('/deleteComponentAjax', [ComponentController::class, 'deleteComponentAjax']);

Route::delete('/deleteCatAjax', [CvCategoryController::class, 'deleteCatAjax'])->name('cat.delete');
Route::delete('/deletePcatAjax', [ParentCategoryController::class, 'deletePcatAjax'])->name('pCat.delete');
