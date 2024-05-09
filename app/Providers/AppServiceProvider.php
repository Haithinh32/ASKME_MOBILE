<?php

namespace App\Providers;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Brands;
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

        View::composer('components.navi', function ($view) {
            $brands = Brands::all();

            $sharedData = [
                'brands' => $brands
            ];
            $view->with($sharedData);
        });

    }
}
