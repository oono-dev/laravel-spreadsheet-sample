<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpreadSheetController;

Route::resource('spreadsheet', SpreadSheetController::class)->only(['index', 'store']);
