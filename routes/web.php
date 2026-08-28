<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\HouseController as AdminHouseController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\PlotController as AdminPlotController;
use App\Http\Controllers\Admin\PlotTypeController as AdminPlotTypeController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes — POWER FAMILY INVESTMENT
|--------------------------------------------------------------------------
*/

// Localization Switcher
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Plots Catalogue (/viwanja)
Route::get('/viwanja', [PlotController::class, 'index'])->name('plots.index');
Route::get('/viwanja/{slug}', [PlotController::class, 'show'])->name('plots.show');
Route::get('/plots', [PlotController::class, 'index']);
Route::get('/plots/{slug}', [PlotController::class, 'show']);

// Houses Catalogue (/nyumba)
Route::get('/nyumba', [HouseController::class, 'index'])->name('houses.index');
Route::get('/nyumba/{slug}', [HouseController::class, 'show'])->name('houses.show');

// Vehicles Catalogue (/magari)
Route::get('/magari', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/magari/{slug}', [VehicleController::class, 'show'])->name('vehicles.show');

// Locations Directory (/maeneo)
Route::get('/maeneo', [LocationController::class, 'index'])->name('locations.index');
Route::get('/maeneo/{slug}', [LocationController::class, 'show'])->name('locations.show');
Route::get('/locations', [LocationController::class, 'index']);
Route::get('/locations/{slug}', [LocationController::class, 'show']);

// Photo & Project Gallery (/gallery)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Investment Education & Blog (/blog)
Route::get('/blog', [PageController::class, 'insights'])->name('pages.blog');
Route::get('/blog/{slug}', [PageController::class, 'showArticle'])->name('pages.article');
Route::get('/insights', [PageController::class, 'insights']);
Route::get('/insights/{slug}', [PageController::class, 'showArticle']);

// Institutional Pages
Route::get('/kuhusu-sisi', [PageController::class, 'about'])->name('pages.about');
Route::get('/about', [PageController::class, 'about']);
Route::get('/mawasiliano', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('pages.privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('pages.terms');

// Lead & Inquiry Submission
Route::post('/enquiry', [PageController::class, 'submitEnquiry'])->name('enquiry.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Plots Management
        Route::resource('plots', AdminPlotController::class);
        Route::post('plots/{plot}/toggle-publish', [AdminPlotController::class, 'togglePublish'])->name('plots.toggle-publish');
        Route::post('plots/{plot}/toggle-featured', [AdminPlotController::class, 'toggleFeatured'])->name('plots.toggle-featured');
        Route::post('plots/{plot}/status', [AdminPlotController::class, 'updateStatus'])->name('plots.status');
        Route::delete('plots/images/{image}', [AdminPlotController::class, 'deleteImage'])->name('plots.images.destroy');

        // Houses Management
        Route::resource('houses', AdminHouseController::class);
        Route::delete('houses/images/{image}', [AdminHouseController::class, 'deleteImage'])->name('houses.images.destroy');

        // Vehicles Management
        Route::resource('vehicles', AdminVehicleController::class);
        Route::delete('vehicles/images/{image}', [AdminVehicleController::class, 'deleteImage'])->name('vehicles.images.destroy');

        // Locations Management
        Route::resource('locations', AdminLocationController::class);

        // Plot Types Management
        Route::resource('plot-types', AdminPlotTypeController::class);

        // Blog Articles Management
        Route::resource('articles', AdminArticleController::class);

        // Gallery Management
        Route::resource('gallery', AdminGalleryController::class)->only(['index', 'create', 'store', 'destroy']);

        // Inquiries CRM
        Route::resource('enquiries', AdminEnquiryController::class)->only(['index', 'show', 'update', 'destroy']);

        // Company & Website Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
