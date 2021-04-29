<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User
Route::prefix('/')->group(function () {
    Route::get('/', [AttendanceController::class, 'indexFront'])->name('front.data.wish');
    Route::get('/gallery', [GalleryController::class, 'indexFront'])->name('front.data.gallery');
    Route::get('/contact', [ContactController::class, 'indexFront'])->name('front.data.contact');
    
    Route::post('/message/post', [WishController::class, 'create'])->name('post.wish');
    Route::post('/attendance/post', [AttendanceController::class, 'create'])->name('post.attendance');
    Route::post('/contact/post', [ContactController::class, 'create'])->name('post.contact');
});

// Admin
Route::prefix('/admin')->middleware("auth")->group(function () {
    Route::get('/', [AttendanceController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/message', [WishController::class, 'index'])->name('admin.data.wish');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('admin.data.attendance');
    Route::get('/event', [EventController::class, 'index'])->name('admin.data.event');
    Route::get('/event-add', [EventController::class, 'add'])->name('admin.event.add');
    Route::post('/event/add', [EventController::class, 'create'])->name('admin.event.create');
    
    Route::get('/story', [GalleryController::class, 'indexStory'])->name('admin.story.data');
    Route::get('/story/add', [GalleryController::class, 'addStory'])->name('admin.story.add');
    Route::post('/story/add', [GalleryController::class, 'createStory'])->name('admin.story.create');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery.data');
    Route::get('/gallery/add', [GalleryController::class, 'addGallery'])->name('admin.gallery.add');
    Route::post('/gallery/add', [GalleryController::class, 'createGallery'])->name('admin.gallery.create');

    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.data');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
