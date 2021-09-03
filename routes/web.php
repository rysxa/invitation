<?php

use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Backend\EventController as BackendEventController;
use App\Http\Controllers\Backend\GalleryController as BackendGalleryController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\StatusController as BackendStatusController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\WishController as BackendWishController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\WishController as FrontendWishController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Auth::routes();
// Auth::routes(['verify' => true]);
// User
Route::prefix('/')->group(function () {
    Route::get('/', [FrontendHomeController::class, 'dashboard'])->name('front.dashboard');
    Route::get('/{data:slug}', [FrontendHomeController::class, 'index'])->name('front.data.wish');

    Route::get('/{data:slug}/gallery', [FrontendGalleryController::class, 'index'])->name('front.data.gallery');

    Route::post('/{data:slug}/message/post', [FrontendWishController::class, 'create'])->name('post.wish');
    Route::post('/{data:slug}/attendance/post', [HomeController::class, 'create'])->name('post.attendance');

    Route::get('/{data:slug}/contact', [FrontendContactController::class, 'index'])->name('front.data.contact');
    Route::post('/{data:slug}/contact/post', [FrontendContactController::class, 'create'])->name('post.contact');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('/admin')->namespace('Backend')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BackendHomeController::class, 'dashboard'])->name('admin.dashboard');

    // Config
    Route::get('/user', [BackendUserController::class, 'index'])->name('admin.user.data');
    Route::get('/user-add', [BackendUserController::class, 'add'])->name('admin.user.add');
    Route::post('/user/add', [BackendUserController::class, 'store'])->name('admin.user.create');
    Route::put('/user/update/{data}', [BackendUserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/delete', [BackendUserController::class, 'destroy'])->name('admin.user.delete');
    Route::get('/status', [BackendStatusController::class, 'index'])->name('admin.status.data');

    // Master
    Route::get('/event', [BackendEventController::class, 'index'])->name('admin.data.event');
    Route::get('/event-add', [BackendEventController::class, 'add'])->name('admin.event.add');
    Route::post('/event/add', [BackendEventController::class, 'store'])->name('admin.event.create');
    Route::put('/event/update/{data}', [BackendEventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/delete/{event}', [BackendEventController::class, 'destroy'])->name('admin.event.delete');

    Route::get('/story', [BackendGalleryController::class, 'indexStory'])->name('admin.story.data');
    Route::get('/story/add', [BackendGalleryController::class, 'addStory'])->name('admin.story.add');
    Route::post('/story/add', [BackendGalleryController::class, 'storeStory'])->name('admin.story.create');
    Route::put('/story/update/{data}', [BackendGalleryController::class, 'updateStory'])->name('admin.story.update');
    Route::delete('/story/delete/{story}', [BackendGalleryController::class, 'destroyStory'])->name('admin.story.delete');

    Route::get('/contact-info', [BackendContactController::class, 'indexContactInfo'])->name('admin.contactinfo.data');
    Route::get('/contact-info/add', [BackendContactController::class, 'addContactInfo'])->name('admin.contactinfo.add');
    Route::post('/contact-info/add', [BackendContactController::class, 'createContactInfo'])->name('admin.contactinfo.create');
    Route::put('/contact-info/update/{data}', [BackendContactController::class, 'updateContactInfo'])->name('admin.contact-info.update');
    Route::delete('/contact-info/delete/{contactInfo}', [BackendContactController::class, 'destroyContactInfo'])->name('admin.contact-info.delete');

    Route::get('/gallerys', [BackendGalleryController::class, 'index'])->name('admin.gallery.data');
    Route::get('/gallerys/add', [BackendGalleryController::class, 'addGallery'])->name('admin.gallery.add');
    Route::post('/gallerys/add', [BackendGalleryController::class, 'storeGallery'])->name('admin.gallery.create');
    Route::put('/gallerys/update/{data}', [BackendGalleryController::class, 'updateGallery'])->name('admin.gallery.update');
    Route::delete('/gallerys/delete/{gallery}', [BackendGalleryController::class, 'destroyGallery'])->name('admin.gallery.delete');

    Route::get('/gallery-head', [BackendGalleryController::class, 'headGallery'])->name('admin.gallery.head');
    Route::get('/gallery-head/add', [BackendGalleryController::class, 'addheadGallery'])->name('admin.gallery-head.add');
    Route::post('/gallery-head/add', [BackendGalleryController::class, 'storeheadGallery'])->name('admin.gallery-head.create');
    Route::put('/gallery-head/update/{data}', [BackendGalleryController::class, 'updateHeadGallery'])->name('admin.gallery-head.update');
    Route::delete('/gallery-head/delete/{galleryCaption}', [BackendGalleryController::class, 'destroyHeadGallery'])->name('admin.gallery-head.delete');

    // Friends Wishes
    Route::get('/message', [BackendWishController::class, 'index'])->name('admin.data.wish');
    Route::put('/message/update/{data}', [BackendWishController::class, 'updateMessage'])->name('admin.message.update');
    Route::delete('/message/delete/{wish}', [BackendWishController::class, 'destroyMessage'])->name('admin.message.delete');

    Route::get('/attendances', [BackendWishController::class, 'indexAttendance'])->name('admin.data.attendance');
    Route::put('/attendances/update/{data}', [BackendWishController::class, 'updateAttendance'])->name('admin.attendance.update');
    Route::delete('/attendances/delete/{attendance}', [BackendWishController::class, 'destroyAttendance'])->name('admin.attendance.delete');

    Route::get('/contacts', [BackendContactController::class, 'index'])->name('admin.contact.data');
    Route::put('/contacts/update/{data}', [BackendContactController::class, 'updateContact'])->name('admin.contact.update');
    Route::delete('/contacts/delete/{contact}', [BackendContactController::class, 'destroyContact'])->name('admin.contact.delete');

    Route::get('/profile', [BackendContactController::class, 'index'])->name('admin.profile.data');
});



// // Auth
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login')->name('store.login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register')->name('store.register');
