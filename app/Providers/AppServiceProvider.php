<?php

namespace App\Providers;
use App\Observers\AuditObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\MainMenu;
use Illuminate\Support\Facades\View;


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
        View::composer('*', function ($view) {

            $menus = Cache::rememberForever('main_menu', function () {
                return MainMenu::whereNull('ref_id')
                    ->where('status', 'Yes')
                    ->with(['children.children'])
                    ->orderBy('sort_level')
                    ->get();
            });

            $view->with('menus', $menus);
        });
    }
}
