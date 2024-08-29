<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    public function index(Folder $folder, Request $request)
    {
        // 全てのフォルダを取得する
        // $folders = Folder::all();
        // $folders = Auth::user()->folders()->get();
        /**
         * ユーザーが一度認証されると、Illuminate\Http\Requestインスタンスを介してその認証済みユーザーへアクセスできることを考慮して、
         * 上記のAuth::user()->folders()の箇所のエラー（Undefined method 'folders'）を回避。
         * 🔸参考：
         * https://readouble.com/laravel/11.x/ja/authentication.html
         */
        $folders = $request->user()->folders()->get();

        // 選ばれたフォルダを取得する
        // $current_folder = Folder::find($id);

        // フォルダがない場合のエラーハンドリング
        // if (is_null($current_folder)) {
        //     abort(404);
        // }

        // 選ばれたフォルダに紐づくタスクを取得する
        // $tasks = $current_folder->tasks()->get();
        $tasks = $folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(Folder $folder)
    {
        return view('tasks.create', [
            'folder_id' => $folder->id
        ]);
    }

    public function create(Folder $folder, CreateTask $request)
    {
        // $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        // $current_folder->tasks()->save($task);
        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }

    public function showEditForm(Folder $folder, Task $task)
    {
        // $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        // $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }
}
