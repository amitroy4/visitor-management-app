<?php

use App\Models\Visitor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;

Route::get('/', function () {
    return view('checkin');
});

Route::get('/checkin', function () {
    return view('checkin');
});

Route::get('/dashboard', function () {
    $visitors = Visitor::orderBy('id', 'desc')->paginate(10);
    return view('admin.index',compact('visitors'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/visitor/store', [VisitorController::class, 'store'])->name('visitor.store');
Route::delete('/dashboard/destroy/{id}', [VisitorController::class, 'destroy'])->name('visitor.destroy');
Route::get('/dashboard/visitor/edit', [VisitorController::class, 'edit'])->name('visitor.edit');
Route::post('/dashboard/visitor/update', [VisitorController::class, 'update'])->name('visitor.update');


require __DIR__.'/auth.php';
