<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Policies\GeneralPolicy;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menghubungkan model User dengan GeneralPolicy
    // Jadi, kalau ada cek izin untuk User, akan pakai aturan dari GeneralPolicy
        Gate::policy(User::class, GeneralPolicy::class);



    }
}
