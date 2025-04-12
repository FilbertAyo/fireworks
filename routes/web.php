<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name('welcome');
Route::get('/contact', [DashboardController::class, 'contact']);

Route::get('/dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/chart-data', [DashboardController::class, 'getChartData']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';


Route::get('/test', function () {
    return view('test');
});

Route::get('/dash',[DashboardController::class, 'dash']);

Route::get('/users', [ProfileController::class, 'users']);
Route::get('/customers',[ProfileController::class, 'customers']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::resource('task', TaskController::class);
Route::post('/payment/task', [TaskController::class, 'taskPayment'])->name('task.payment');
Route::get('mytask', [TaskController::class, 'myTask']);
Route::resource('assignments', AssignmentController::class);

Route::resource('products', ProductController::class);
Route::get('/product_list', [ProductController::class,'product_list']);
Route::get('/product/{id}', [ProductController::class, 'product_details'])->name('product.showProduct');
// outside by a customer
Route::get('/book',[TaskController::class, 'book'])->name('book');
Route::get('/cart/clear', [TaskController::class, 'clear'])->name('cart.clear');


// inside by an admin
Route::get('/book/products', [TaskController::class, 'bookCreate'])->name('products.list');
Route::get('/book_create',[TaskController::class, 'book_create'])->name('book_create');

Route::put('/users/{id}/status', [DashboardController::class, 'updateStatus'])->name('users.updateStatus');

Route::get('/my-dashboard',[DashboardController::class, 'myDashboard'])->name('my-dashboard');
Route::get('/booking_detail/{task}', [TaskController::class, 'task_details'])->name('task.showTask');
Route::put('/task_done/{id}', [TaskController::class, 'task_done'])->name('task_done');

Route::post('/payment_update', [AssignmentController::class, 'payment_update'])->name('payment_update');
Route::delete('/payment/{id}', [AssignmentController::class, 'payment_destroy'])->name(name: 'payment.destroy');

Route::get('/category', [ProductController::class, 'category'])->name('category');
Route::post('/category', [ProductController::class, 'storeCategory'])->name('category.store');
Route::delete('/category/{id}', [ProductController::class, 'destroyCategory'])->name('category.destroy');

Route::post('/cart/add', [TaskController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [TaskController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/remove/{id}', [TaskController::class, 'remove'])->name('cart.remove');

Route::get('/partner',[DashboardController::class, 'partners'])->name('partner');
Route::post('/partner', [DashboardController::class, 'partnerStore'])->name('partner.store');
Route::delete('/partner/{id}', [DashboardController::class, 'partnerDestroy'])->name('partner.destroy');

Route::get('/test', function () {
    return view('test');
});
