<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name('welcome');
Route::get('/contact', [DashboardController::class, 'contact']);
Route::get('/book', [TaskController::class, 'book'])->name('book');
Route::get('/product_list', [ProductController::class, 'product_list']);
Route::get('/product/{id}', [ProductController::class, 'product_details'])->name('product.showProduct');
Route::get('/test', fn () => view('test'));

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Customer booking route - accessible to all authenticated users
    Route::post('/booking/store', [TaskController::class, 'store'])->name('booking.store');
    
    // Task details route - accessible to customers (their own tasks) and admin/staff (all tasks)
    Route::get('/booking_detail/{task}', [TaskController::class, 'task_details'])->name('task.showTask');

    Route::middleware('role:customer')->group(function () {
        Route::get('/my-dashboard', [DashboardController::class, 'myDashboard'])->name('my-dashboard');
    });

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/dash', [DashboardController::class, 'dash'])->name('admin.dashboard');
        Route::get('/chart-data', [DashboardController::class, 'getChartData'])->name('chart-data');

        Route::resource('task', TaskController::class);
        Route::get('mytask', [TaskController::class, 'myTask'])->name('task.mine');
        Route::put('/task_done/{id}', [TaskController::class, 'task_done'])->name('task_done');

        Route::resource('assignments', AssignmentController::class);
        Route::post('/payment_update', [AssignmentController::class, 'payment_update'])->name('payment_update');
        Route::delete('/payment/{id}', [AssignmentController::class, 'payment_destroy'])->name('payment.destroy');

        Route::get('/book/products', [TaskController::class, 'bookCreate'])->name('products.list');
        Route::get('/book_create', [TaskController::class, 'book_create'])->name('book_create');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [ProfileController::class, 'users'])->name('admin.users');
        Route::get('/customers', [ProfileController::class, 'customers'])->name('admin.customers');
        Route::post('/admin/users', [RegisteredUserController::class, 'store'])->name('admin.users.store');
        Route::put('/admin/users/{user}', [RegisteredUserController::class, 'update'])->name('admin.users.update');
        Route::put('/users/{id}/status', [DashboardController::class, 'updateStatus'])->name('users.updateStatus');

        Route::resource('products', ProductController::class);
        Route::get('/category', [ProductController::class, 'category'])->name('category');
        Route::post('/category', [ProductController::class, 'storeCategory'])->name('category.store');
        Route::put('/category/{id}', [ProductController::class, 'updateCategory'])->name('category.update');
        Route::delete('/category/{id}', [ProductController::class, 'destroyCategory'])->name('category.destroy');
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings/faqs', [FaqController::class, 'store'])->name('settings.faqs.store');
        Route::put('/settings/faqs/{faq}', [FaqController::class, 'update'])->name('settings.faqs.update');
        Route::delete('/settings/faqs/{faq}', [FaqController::class, 'destroy'])->name('settings.faqs.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
