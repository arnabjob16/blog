<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Post\PostRepo;
use App\Repositories\Post\PostRepoImpl;
use App\Repositories\User\UserRepo;
use App\Repositories\User\UserRepoImpl;
use App\Repositories\Comment\CommentRepo;
use App\Repositories\Comment\CommentRepoImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepo::class, PostRepoImpl::class);
        $this->app->bind(UserRepo::class, UserRepoImpl::class);
        $this->app->bind(CommentRepo::class, CommentRepoImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
