<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewServicesCoursesController;
use App\Http\Controllers\WellingEldersController;
use App\Http\Controllers\WellingYouthsController;
use App\Http\Controllers\YouthServicesController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('about-us', [AboutUsController::class, 'index']);
Route::get('new-services-courses', [NewServicesCoursesController::class, 'index']);
Route::get('youth-services', [YouthServicesController::class, 'index']);
Route::get('welling-youths', [WellingYouthsController::class, 'index']);
Route::get('welling-elders', [WellingEldersController::class, 'index']);
Route::get('contact-us', [ContactUsController::class, 'index']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
