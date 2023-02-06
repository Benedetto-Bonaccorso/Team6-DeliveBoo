<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route::resource('projects', ProjectController::class)->parameters([
        //     'projects' => 'project:slug_title'
        // ]);
        // Route::resource('technologies', TechnologyController::class)->parameters([
        //     'technologies' => 'technology:slug'
        // ])->except(['edit', 'show', 'create']);
    });

require __DIR__ . '/auth.php';
