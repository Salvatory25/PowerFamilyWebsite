<?php

namespace App\Providers;

use App\Models\PlotType;
use App\Models\Location;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useTailwind();

        // Share common settings and categories with all views safely
        View::composer('*', function ($view) {
            if (Schema::hasTable('settings')) {
                $whatsappNumber = Setting::get('whatsapp_number', '+255742448965');
                $contactPhone = Setting::get('contact_phone', '+255 742 448 965');
                $contactEmail = Setting::get('contact_email', 'info@reland.co.tz');
                $officeAddress = Setting::get('office_address', 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania');
                $locationBadge = Setting::get('top_bar_location_badge', 'Arusha, Tanzania');
                $locale = app()->getLocale();
                $topTagline = Setting::get('top_bar_tagline_' . $locale, Setting::get('top_bar_tagline', '"Ardhi Yako Mtaji Wako" — Mipango Mji | Upimaji | Hati Miliki'));

                $view->with([
                    'siteWhatsapp' => $whatsappNumber,
                    'siteWhatsappClean' => preg_replace('/[^0-9]/', '', $whatsappNumber),
                    'sitePhone' => $contactPhone,
                    'siteEmail' => $contactEmail,
                    'siteAddress' => $officeAddress,
                    'siteLocationBadge' => $locationBadge,
                    'siteTagline' => $topTagline,
                ]);
            }
        });
    }
}
