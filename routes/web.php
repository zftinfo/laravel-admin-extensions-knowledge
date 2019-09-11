<?php

use ZFTInfo\Knowledge\Http\Controllers\CourseController;

use ZFTInfo\Knowledge\Http\Controllers\ArticleController;

use ZFTInfo\Knowledge\Http\Controllers\TagController;

Route::resource('course',  CourseController::class);

Route::resource('article',  ArticleController::class);

Route::resource('tag',  TagController::class);