<?php

use App\Http\Controllers\CompareDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompareDataController::class, 'index']);
