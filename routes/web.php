<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

 Route::get('/', [HomeController::class, 'index']);


Route::prefix('admin')->middleware(['auth','admin'])->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index']);


    });




// Route::prefix('user')->middleware(['auth','user'])->group(function () {

//      Route::get('/', [HomeController::class, 'index']);


//     });


