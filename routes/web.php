<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendTestMail;
use Illuminate\Http\Request;

Route::middleware('cacheResponse')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/features', [PageController::class, 'features'])->name('features');
    Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
    Route::get('/blog', [PageController::class, 'blog'])->name('blog');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/queue-mail', function () {
    return view('queue-mail');
})->name('queue-mail');

Route::post('/queue-mail', function (Request $request) {
    SendTestMail::dispatch('test@example.com')->onQueue('mail');
    return back()->with('ok', true);
});

Route::get('/queue-mail/test/{count}', function (int $count) {
    for ($i = 0; $i < $count; $i++) {
        SendTestMail::dispatch('test@example.com');
    }

    return response()->json(['queued' => $count]);
});

require __DIR__ . '/auth.php';
