<?php

use App\Models\Visitor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;

Route::get('/', function () {
    return view('frontpage');
});

Route::get('/checkin', function () {
    return view('checkin');
});

Route::get('/dashboard', function () {
    $visitors = Visitor::orderBy('id', 'desc')->paginate(10);
    return view('admin.index',compact('visitors'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/residance', function () {
    return view('admin.residance');
})->middleware(['auth', 'verified'])->name('residance');

Route::get('/dashboard/residance/addresidance', function () {
    return view('admin.addresidance');
})->middleware(['auth', 'verified'])->name('addresidance');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/visitor/store', [VisitorController::class, 'store'])->name('visitor.store');
Route::delete('/dashboard/destroy/{id}', [VisitorController::class, 'destroy'])->name('visitor.destroy');
Route::get('/dashboard/visitor/edit', [VisitorController::class, 'edit'])->name('visitor.edit');
Route::post('/dashboard/visitor/update', [VisitorController::class, 'update'])->name('visitor.update');
// Route::get('/dashboard/visitor/search', [VisitorController::class, 'search'])->name('visitor.search');
Route::get('/dashboard/visitor/namesearch', [VisitorController::class, 'nameSearch'])->name('visitor.nameSearch');
Route::get('/dashboard/visitor/unitnumbersearch', [VisitorController::class, 'unitNumberSearch'])->name('visitor.unitNumberSearch');
Route::get('/dashboard/visitor/checkout/search', [VisitorController::class, 'checkoutSearch'])->name('visitor.checkout.search');
Route::post('/dashboard/visitor/checkout/{id}', [VisitorController::class, 'checkout'])->name('visitor.checkout');
Route::post('/dashboard/visitor/generatePdf', [VisitorController::class, 'generatePdf'])->name('visitor.generatePdf');
Route::get('/frontpage', function () {
    return view('frontpage');
});


require __DIR__.'/auth.php';
