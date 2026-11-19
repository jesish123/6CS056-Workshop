<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::apiResource('courses', CourseController::class);
});
