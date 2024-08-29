<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // ログインユーザーを取得
        //$user = Auth::user();
        /**
         * ユーザーが一度認証されると、Illuminate\Http\Requestインスタンスを介してその認証済みユーザーへアクセスできることを考慮して、
         * 上記のAuth::user()->folders()の箇所のエラー（Undefined method 'folders'）を回避。
         * 🔸参考：
         * https://readouble.com/laravel/11.x/ja/authentication.html
         */
        $user = $request->user();
        // ログインユーザーに紐づくフォルダを取得
        $folders = $user->folders();

        // フォルダが一つもない場合はホームページをレスポンス
        if(is_null($folders)){
            return view('home');
        }

        // フォルダがある場合は一つ目のフォルダを取得し、そのフォルダのタスク一覧にリダイレクトする
        $first_folder = $folders->first();
        return redirect()->route('tasks.index', [
            'folder' => $first_folder->id,
        ]);

    }
}
