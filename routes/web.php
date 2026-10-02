<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tours', [TourController::class, 'index'])->name('tours.index');

// ★ ここから追加：詳細ページのルーティング
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');

// ★ 予約関連ルーティング
Route::get('/tours/{id}/book', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/tours/{id}/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');

// ★ ここが定義されているか確認！ (末尾の ->name('bookings.index') が必要です)
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');