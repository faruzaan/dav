<?php
use App\Http\Controllers\IslandController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/', [PublicController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //destintation
    Route::get('/admin/destination', [DestinationController::class, 'index']);
    Route::post('/admin/destination', [DestinationController::class, 'store']);
    Route::get('/admin/destination/getDestination', [DestinationController::class, 'getDestination']);
    Route::patch('/admin/destination/edit', [DestinationController::class, 'edit']);
    Route::delete('/admin/destination/{id}/delete', [DestinationController::class, 'destroy']);
    //island
    Route::get('/admin/island', [IslandController::class, 'index']);
    Route::post('/admin/island', [IslandController::class, 'store']);
    Route::get('/admin/island/getIsland', [IslandController::class, 'getIsland']);
    Route::patch('/admin/island/edit', [IslandController::class, 'edit']);
    Route::delete('/admin/island/{id}/delete', [IslandController::class, 'destroy']);
    //tour
    Route::get('/admin/tour', [TourController::class, 'index']);
    Route::get('/admin/tour/{id}', [TourController::class, 'detail']);
    Route::post('/admin/tour', [TourController::class, 'store']);
    Route::get('/admin/tour/getTour', [TourController::class, 'getTour']);
    Route::patch('/admin/tour/edit', [TourController::class, 'edit']);
    Route::delete('/admin/tour/{id}/delete', [TourController::class, 'destroy']);
    //category
    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::get('/admin/category/getCategory', [CategoryController::class, 'getCategory']);
    Route::patch('/admin/category/edit', [CategoryController::class, 'edit']);
    Route::delete('/admin/category/{id}/delete', [CategoryController::class, 'destroy']);
    //product
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::post('/admin/product', [ProductController::class, 'store']);
    Route::get('/admin/product/getProduct', [ProductController::class, 'getProduct']);
    Route::patch('/admin/product/edit', [ProductController::class, 'edit']);
    Route::delete('/admin/product/{id}/delete', [ProductController::class, 'destroy']);
});

require __DIR__.'/auth.php';
