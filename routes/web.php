<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', fn() => redirect('/login'));


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// protected dashboards
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
    });
});


//-----------------------------------------------------------------------------------------------------
use App\Http\Controllers\Manager\ProjectController as ManagerProjectController;
use App\Http\Controllers\Manager\ProjectFileController as ManagerProjectFileController;

Route::prefix('manager')
    ->name('manager.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('dashboard', [ManagerProjectController::class, 'dashboard'])
            ->name('dashboard');

        // Tasks list
        Route::get('tasks', [ManagerProjectController::class, 'tasks'])
            ->name('tasks');

        // Show create_task blade (manager fills project details)
        Route::get('projects/{project}/create_task', [ManagerProjectController::class, 'createTask'])
            ->name('projects.create_task');

        // Store manager-entered fields (use POST for simplicity)
        Route::post('projects/{project}/create_task', [ManagerProjectController::class, 'storeTask'])
            ->name('projects.create_task.store');

        // before_task (pre-execution) page
        Route::get('projects/{project}/before_task', [ManagerProjectController::class, 'before_task'])
            ->name('projects.before_task');

        // File endpoints
        Route::post('projects/{project}/files', [ManagerProjectFileController::class, 'store'])
            ->name('projects.files.store');

        Route::get('projects/{project}/files/{file}', [ManagerProjectFileController::class, 'download'])
            ->name('projects.files.download');

        Route::delete('projects/{project}/files/{file}', [ManagerProjectFileController::class, 'destroy'])
            ->name('projects.files.destroy');
    });
