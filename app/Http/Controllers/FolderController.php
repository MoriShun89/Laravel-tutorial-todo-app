<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成
        $folder = new Folder();
        // タイトルに入力値を代入
        $folder->title = $request->title;
        // インスタンスの状態をテーブルに書き込む
        // ユーザーに紐づけて保存
        // Auth::user()->folders()->save($folder);
        /**
         * ユーザーが一度認証されると、Illuminate\Http\Requestインスタンスを介してその認証済みユーザーへアクセスできることを考慮して、
         * 上記のAuth::user()->folders()の箇所のエラー（Undefined method 'folders'）を回避。
         * 🔸参考：
         * https://readouble.com/laravel/11.x/ja/authentication.html
         */
        $request->user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id
        ]);
    }
}
