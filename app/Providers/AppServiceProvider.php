<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Folder;
use App\Policies\FolderPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Folderのモデルクラスとポリシークラスを紐づけ
        // 🔸参考：https://readouble.com/laravel/11.x/ja/authorization.html#creating-policies
        Gate::policy(Folder::class, FolderPolicy::class);
    }
}
