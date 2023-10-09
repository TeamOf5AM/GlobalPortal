<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

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

Route::get('/', [HomeController::class, 'login']);
// Route::get('admin/login', function () {
//     return view('admin.auth.login')->name('admin.login');
// });

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home.dashboard');
Route::get('/users', [HomeController::class, 'user'])->name('users');

Route::resource('categories', CategoryController::class);
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories/edit/{id}', 'edit')->name('categories.edit');
    Route::get('/categories/destroy/{id}', 'destroy')->name('categories.destroy');
    Route::post('/categories/featured', 'updateFeatured')->name('categories.featured');
});

Route::prefix('setting')->group(function () {
    Route::get('header', [HomeController::class, 'header'])->name('setting.header');
    Route::get('footer', [HomeController::class, 'footer'])->name('setting.footer');
    Route::get('appearance', [HomeController::class, 'appearance'])->name('setting.appearance');
    Route::get('pages', [HomeController::class, 'pages'])->name('setting.pages');
});
