<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\AreaController;


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

Route::get('/Computer/create',[ComputerController::class,'create']);
Route::post('/Computer/store',[ComputerController::class,'store'])->name('Computer.store');

Route::get('/TrainingCenter/create',[TrainingCenterController::class,'create']);
Route::post('/TrainingCenter/store',[TrainingCenterController::class,'store'])->name('TrainingCenter.store');


Route::get('/areas',[AreaController::class,'webIndex'])->name('areas.index');
Route::get('/areas/create',[AreaController::class,'create'])->name('areas.create');
Route::post('/areas/store',[AreaController::class,'store'])->name('areas.store');
Route::get('/areas/{area}/editar',[AreaController::class,'edit'])->name('areas.edit');
Route::put('/areas/{area}',[AreaController::class,'update'])->name('areas.update');
Route::delete('/areas/{area}',[AreaController::class,'destroy'])->name('areas.destroy');

