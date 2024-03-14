<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
         View::composer('layouts.navbar', function ($view) {
            // Ambil data dari session atau tempat penyimpanan lainnya
            $dataApprovedNotifications = session('data_approved_notifications');

            // Berikan data ke view
            $view->with('dataApprovedNotifications', $dataApprovedNotifications);
        });

         View::composer('admin.layouts.navbar', function ($view) {
            // Ambil data dari session atau tempat penyimpanan lainnya
            $dataAdminNotifications = session('admin_data_input_notifications');

            // Berikan data ke view
            $view->with('dataAdminNotifications', $dataAdminNotifications);
        });
    }
}
