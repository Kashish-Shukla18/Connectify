<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\Main;
use App\Livewire\Explore;
use App\Livewire\Home;
use App\Livewire\Post\View\Page;
use App\Livewire\Profile\Home as ProfileHome;
use App\Livewire\Profile\community;
use App\Livewire\Profile\Saved;
use App\Livewire\community as Livewirecommunity;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [Home::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// Auth::routes(['verify' => true]);

// Route::get('/email/verify', function () {

//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [Home::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::middleware(['auth', 'verified'])->group(function () {    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', Home::class)->name('Home');
    Route::get('/explore', Explore::class)->name('explore');
    Route::get('/community', Livewirecommunity::class)->name('community');
    Route::get('/post/{post}', Page::class)->name('post');
    Route::get('/chat',Index::class)->name('chat');
    Route::get('/chat/{chat}',Main::class)->name('chat.main');
    Route::get('/profile/{user}',ProfileHome::class)->name('profile.home');
    Route::get('/profile/{user}/community',community::class)->name('profile.community');
    Route::get('/profile/{user}/saved',Saved::class)->name('profile.saved');

});

require __DIR__.'/auth.php';
