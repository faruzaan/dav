<?php
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DestinationDetailController;
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

Route::get('/', [PublicController::class, 'index']);
Route::get('/pages/about', [PublicController::class, 'about']);
Route::get('/pages/contact', [PublicController::class, 'contact']);

Route::get('/destination', [PublicController::class, 'destination']);
Route::get('/destination/{id}', [PublicController::class, 'destinationDetail']);
Route::get('/tour', [PublicController::class, 'tour']);
Route::get('/tour/{id}', [PublicController::class, 'tourDetail']);

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //destintation detail
    Route::get('/admin/destinationDetail', [DestinationDetailController::class, 'index']);
    Route::post('/admin/destinationDetail', [DestinationDetailController::class, 'store']);
    Route::get('/admin/destinationDetail/{id}', [DestinationDetailController::class, 'detail']);
    Route::patch('/admin/destinationDetail/edit', [DestinationDetailController::class, 'edit']);
    Route::delete('/admin/destinationDetail/{id}/delete', [DestinationDetailController::class, 'destroy']);
    //destination
    Route::get('/admin/destination', [DestinationController::class, 'index']);
    Route::post('/admin/destination', [DestinationController::class, 'store']);
    Route::get('/admin/destination/getDestination', [DestinationController::class, 'getDestination']);
    Route::patch('/admin/destination/edit', [DestinationController::class, 'edit']);
    Route::delete('/admin/destination/{id}/delete', [DestinationController::class, 'destroy']);

    Route::get('/admin/destination/{id}', [DestinationController::class, 'detail']);
    //tour
    Route::get('/admin/tour', [TourController::class, 'index']);
    Route::get('/admin/tour/{id}', [TourController::class, 'detail']);
    Route::post('/admin/tour', [TourController::class, 'store']);
    Route::patch('/admin/tour/edit', [TourController::class, 'edit']);
    Route::delete('/admin/tour/{id}/delete', [TourController::class, 'destroy']);

    Route::delete('/admin/tourDetail/{id}/delete', [TourController::class, 'destroyDetail']);
    Route::post('/admin/tour/tourDetails', [TourController::class, 'addDetail']);
    Route::post('/admin/tour/tourDetails/edit', [TourController::class, 'editDetail']);

    Route::post('/admin/itenary/add', [TourController::class, 'addItenary']);
    Route::post('/admin/itenary/edit', [TourController::class, 'editItenary']);
    Route::delete('/admin/itenary/{id}/delete', [TourController::class, 'deleteItenary']);

    Route::post('/admin/addDetailItenary', [TourController::class, 'addDetailItenary']);
    Route::delete('admin/itenaryDetail/{id}/delete', [TourController::class, 'deleteDetailItenary']);
    Route::post('admin/editDetailItenary/', [TourController::class, 'editDetailItenary']);

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
