<?php

namespace App\Providers;
use App\Models\Contact;
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
        //

      
        View::composer('components.footer', function ($view) {
            $global_contact = Contact::first();

            $sharedData = [
                'global_contact' => $global_contact
            ];
            $view->with($sharedData);
        });
    }
}
