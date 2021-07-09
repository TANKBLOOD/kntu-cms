<?php

use App\Http\Controllers\AnnouncementPostController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CvCategoryController;
use App\Http\Controllers\CvConfigController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\ParentCategoryController;
use App\Models\AnnouncementPost;
use App\Models\CvCategory;
use App\Models\GeneralInfo;
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

Route::get('/', [ParentCategoryController::class, 'index']);
Route::get('/cvConfig', [CvConfigController::class, 'displayCvConfigPage'])->name('config.display')->middleware('auth');
Route::post('/pCatAjax', [ParentCategoryController::class, 'createPcatAjax'])->name('pCat.create')->middleware('auth');
Route::post('/catAjax', [CvCategoryController::class, 'createCatAjax'])->name('cat.create')->middleware('auth');

Route::post('/cvAjax', [CvController::class, 'getCvsByCategoryAjax'])->name('cv.load')->middleware('auth');
Route::post('/createCvAjax', [CvController::class, 'createCvAjax'])->name('cv.create')->middleware('auth');

Route::delete('/deleteCvAjax', [CvController::class, 'removeCvAjax'])->name('cv.delete')->middleware('auth');

Route::get('/adminCvShow/{cv}', [CvController::class, 'adminShowCv'])->name('cv.admin.show')->middleware('auth');

Route::get('/editCv/{cv}', [CvController::class, 'edit'])->name('cv.edit')->middleware('auth');
Route::post('/updateComponentAjax', [ComponentController::class, 'updateComponentAjax'])->name('cv.update')->middleware('auth');
Route::delete('/deleteComponentAjax', [ComponentController::class, 'deleteComponentAjax'])->middleware('auth');

Route::delete('/deleteCatAjax', [CvCategoryController::class, 'deleteCatAjax'])->name('cat.delete')->middleware('auth');
Route::delete('/deletePcatAjax', [ParentCategoryController::class, 'deletePcatAjax'])->name('pCat.delete')->middleware('auth');

Route::post('/updatePcatAjax', [ParentCategoryController::class, 'editPcatAjax'])->name('pCat.update')->middleware('auth');
Route::post('/updateCatAjax', [CvCategoryController::class, 'editCatAjax'])->name('cat.update')->middleware('auth');

Route::post('/createComAjax', [ComponentController::class, 'createComponentAjax'])->name('comp.create')->middleware('auth');
Route::post('/editCvName', [CvController::class, 'updateCvNameAjax'])->name('cv.editname')->middleware('auth');

Route::get('/AdminCreatePost', [AnnouncementPostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/AdminCreatePost', [AnnouncementPostController::class,'store'])->name('post.store')->middleware('auth');

Route::get('/showPost/{post}', [AnnouncementPostController::class, 'show'])->name('post.show');

Route::get('/AdminEditPost/{post}', [AnnouncementPostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::post('/AdminUpdatePost', [AnnouncementPostController::class, 'update'])->name('post.update')->middleware('auth');

Route::get('/adminPosts', [AnnouncementPostController::class, 'adminIndex'])->name('admin.post.index')->middleware('auth');
Route::get('/posts', [AnnouncementPostController::class, 'index'])->name('post.index');

Route::get('/cv', [ParentCategoryController::class, 'index'])->name('cv.index');

Route::get('/generalInfoConfig', [GeneralInfoController::class, 'configPage'])->name('genelInfo.config')->middleware('auth');
Route::post('/generalInfoConfig', [GeneralInfoController::class, 'update'])->name('generalInfo.update')->middleware('auth');

Route::get('/category/cvs/{category}', [CvCategoryController::class, 'getCvs'])->name('category-cv-show');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
