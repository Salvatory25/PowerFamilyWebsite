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
                $locationBadge = Setting::get('top_bar_location_badge', null);
                $brandSubtext = Setting::get('brand_subtext', 'Land Services • Arusha');
                $coverageRegions = Setting::get('coverage_regions', 'Arusha City • Meru • Monduli • Northern Zone');
                $locale = app()->getLocale();
                
                $heroBadge = Setting::get('hero_badge_' . $locale, Setting::get('hero_badge', null));
                $topTagline = Setting::get('top_bar_tagline_' . $locale, Setting::get('top_bar_tagline', null));
                $heroTitle = Setting::get('hero_title_' . $locale, null);
                $heroSubtitle = Setting::get('hero_subtitle_' . $locale, null);

                $view->with([
                    'siteWhatsapp' => $whatsappNumber,
                    'siteWhatsappClean' => preg_replace('/[^0-9]/', '', $whatsappNumber),
                    'sitePhone' => $contactPhone,
                    'siteEmail' => $contactEmail,
                    'siteAddress' => $officeAddress,
                    'siteLocationBadge' => $locationBadge,
                    'siteBrandSubtext' => $brandSubtext,
                    'siteCoverageRegions' => $coverageRegions,
                    'siteHeroBadge' => $heroBadge,
                    'siteTagline' => $topTagline,
                    'siteHeroTitle' => $heroTitle,
                    'siteHeroSubtitle' => $heroSubtitle,
                ]);
            }
        });
    }
}
