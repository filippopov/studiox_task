<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);

Route::get('/health', function () {
	return response()->json([
		'status' => 'ok',
	]);
});
