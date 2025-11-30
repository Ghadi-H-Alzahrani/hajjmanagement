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
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
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

Route::prefix('manager')
    ->name('manager.')
    ->middleware(['auth']) 
    ->group(function(){

        // Dashboard
        Route::get('dashboard', [ManagerProjectController::class,'dashboard'])->name('dashboard');

        // Manager projects/tasks list
        Route::get('tasks', [ManagerProjectController::class,'tasks'])->name('tasks');

        // Fill project details (create_task)
        Route::get('projects/{project}/create-task', [ManagerProjectController::class,'createTask'])
            ->name('projects.createTask');

        // Update project (after filling task)
        Route::put('projects/{project}', [ManagerProjectController::class,'storeTask'])
            ->name('projects.createTask.store');
});

 