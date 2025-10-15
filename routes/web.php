<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/', [AdminController::class, 'home']);

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/create_room', [AdminController::class, 'create_room']);

Route::get('/gallery', [AdminController::class, 'gallary']);

Route::post('/add_room', [AdminController::class, 'add_room']);

Route::get('/display_room', [AdminController::class, 'display_room']);

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);

Route::get('/update_room/{id}', [AdminController::class, 'update_room']);

Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('room_details/{id}', [HomeController::class, 'room_details']);

Route::post('add_booking/{id}', [HomeController::class, 'add_booking']);


Route::post('upload_gallary', [AdminController::class, 'upload_gallary']);



Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth','admin']);

Route::get('/messages', [AdminController::class, 'messages']);

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

Route::get('/approve_booking/{id}', [AdminController::class, 'approve_booking']);

Route::get('/delete_booking/{id}', [AdminController::class, 'delete_room_booking']);

Route::get('delete_gallery/{id}',[AdminController::class,'delete_gallery']);

Route::post('/contact',[HomeController::class,'contact']);

Route::get('/delete_contact/{id}',[AdminController::class,'delete_contact']);

Route::get('/send_mail/{id}',[AdminController::class,'send_mail']);

Route::post('/mail/{id}',[AdminController::class,'mail']);
