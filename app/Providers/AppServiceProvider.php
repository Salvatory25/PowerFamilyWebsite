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
            $whatsappNumber = '+255742448965';
            $contactPhone = '+255 742 448 965';
            $contactEmail = 'info@reland.co.tz';
            $officeAddress = 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania';
            $locationBadge = null;
            $brandSubtext = 'Land Services • Arusha';
            $coverageRegions = 'Arusha City • Meru • Monduli • Northern Zone';
            $locale = app()->getLocale();
            $heroBadge = null;
            $topTagline = null;
            $heroTitle = null;
            $heroSubtitle = null;

            try {
                if (Schema::hasTable('settings')) {
                    $whatsappNumber = Setting::get('whatsapp_number', $whatsappNumber);
                    $contactPhone = Setting::get('contact_phone', $contactPhone);
                    $contactEmail = Setting::get('contact_email', $contactEmail);
                    $officeAddress = Setting::get('office_address', $officeAddress);
                    $locationBadge = Setting::get('top_bar_location_badge', null);
                    $brandSubtext = Setting::get('brand_subtext', $brandSubtext);
                    $coverageRegions = Setting::get('coverage_regions', $coverageRegions);
                    
                    $heroBadge = Setting::get('hero_badge_' . $locale, Setting::get('hero_badge', null));
                    $topTagline = Setting::get('top_bar_tagline_' . $locale, Setting::get('top_bar_tagline', null));
                    $heroTitle = Setting::get('hero_title_' . $locale, null);
                    $heroSubtitle = Setting::get('hero_subtitle_' . $locale, null);
                }
            } catch (\Throwable $e) {
                // Database is offline or initializing, fallback to defaults
            }

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
        });
    }
}
