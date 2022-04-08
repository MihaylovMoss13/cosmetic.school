<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LeadController;
// use App\Http\Controllers\Api\TrainingScheduleController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
    
Route::apiResources([
    // 'home'               => HomeController::class,
    'courses'            => CourseController::class,
    'leads'              => LeadController::class,
    'training_schedules' => TrainingScheduleController::class
]);
