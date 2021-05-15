<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\EventController as BackendEventController;
use App\Http\Controllers\Backend\GalleryController as BackendGalleryController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\WishController as BackendWishController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WishController as FrontendWishController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
// User
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('front.data.wish');
    Route::get('/gallery', [FrontendGalleryController::class, 'index'])->name('front.data.gallery');
    Route::get('/contact', [FrontendContactController::class, 'index'])->name('front.data.contact');
    
    Route::post('/message/post', [FrontendWishController::class, 'create'])->name('post.wish');
    Route::post('/attendance/post', [HomeController::class, 'create'])->name('post.attendance');
    Route::post('/contact/post', [FrontendContactController::class, 'create'])->name('post.contact');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('/admin')->namespace('Backend')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [BackendHomeController::class, 'dashboard'])->name('admin.dashboard'); 
    
    Route::get('/message', [BackendWishController::class, 'index'])->name('admin.data.wish');
    Route::get('/attendance', [BackendHomeController::class, 'index'])->name('admin.data.attendance');
    Route::get('/event', [BackendEventController::class, 'index'])->name('admin.data.event');
    Route::get('/event-add', [BackendEventController::class, 'add'])->name('admin.event.add');
    Route::post('/event/add', [BackendEventController::class, 'create'])->name('admin.event.create');
    Route::put('/event/update/{data}', [BackendEventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/delete/{event}', [BackendEventController::class, 'destroy'])->name('admin.event.delete');
    
    Route::get('/story', [BackendGalleryController::class, 'indexStory'])->name('admin.story.data');
    Route::get('/story/add', [BackendGalleryController::class, 'addStory'])->name('admin.story.add');
    Route::post('/story/add', [BackendGalleryController::class, 'createStory'])->name('admin.story.create');

    Route::get('/gallery', [BackendGalleryController::class, 'index'])->name('admin.gallery.data');
    Route::get('/gallery/add', [BackendGalleryController::class, 'addGallery'])->name('admin.gallery.add');
    Route::post('/gallery/add', [BackendGalleryController::class, 'createGallery'])->name('admin.gallery.create');

    Route::get('/contact', [BackendContactController::class, 'index'])->name('admin.contact.data');
});



// // Auth
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login')->name('store.login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register')->name('store.register');