<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    // ホーム画面
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // フォルダの新規作成機能
    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);

    Route::middleware(['can:view,folder'])->group(function () {
        Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    });

    // タスクの新規作成機能
    Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);

    // タスク編集機能
    Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class, 'edit']);
});

// 会員登録機能
Auth::routes();

// Route::get('/debug-user', function () {
//     $user = Auth::user();
//     dd(get_class($user)); // 期待される出力: "App\Models\User"
// });

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
