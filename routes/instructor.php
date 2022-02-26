<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CoursesController;

Route::redirect('','instructor/courses');
 

Route::resource('courses', CoursesController::class)->names('courses');
