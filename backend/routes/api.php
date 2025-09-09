<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\V1\{
    CourseController,
    LessonController,
    QuestionController
};

Route::apiResource('courses', CourseController::class)->only(['index']);
Route::apiResource('courses.lessons', LessonController::class)->only(['index']);
Route::apiResource('lessons.questions', QuestionController::class)->only(['index']);
