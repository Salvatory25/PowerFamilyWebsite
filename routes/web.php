<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\PlotController as AdminPlotController;
use App\Http\Controllers\Admin\PlotTypeController as AdminPlotTypeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Localization Switcher
Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('lang.switch');

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Corporate Land Services
Route::get('/services', [ServiceController::class, 'index'])->name('pages.services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Land Projects Portfolio
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Available Plots Marketplace
Route::get('/plots', [PlotController::class, 'index'])->name('plots.index');
Route::get('/plots/{slug}', [PlotController::class, 'show'])->name('plots.show');

// Locations Directory
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/{slug}', [LocationController::class, 'show'])->name('locations.show');

// Institutional & Content Pages
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/insights', [PageController::class, 'insights'])->name('pages.insights');
Route::get('/blog', [PageController::class, 'insights'])->name('pages.blog'); // Alias
Route::post('/enquiry', [PageController::class, 'submitEnquiry'])->name('enquiry.submit');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/login');
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

        // Projects Management
        Route::resource('projects', AdminProjectController::class);
        Route::post('projects/{project}/toggle-publish', [AdminProjectController::class, 'togglePublish'])->name('projects.toggle-publish');
        Route::post('projects/{project}/toggle-featured', [AdminProjectController::class, 'toggleFeatured'])->name('projects.toggle-featured');
        Route::delete('projects/images/{image}', [AdminProjectController::class, 'deleteImage'])->name('projects.images.destroy');

        // Plots Management
        Route::resource('plots', AdminPlotController::class);
        Route::post('plots/{plot}/toggle-publish', [AdminPlotController::class, 'togglePublish'])->name('plots.toggle-publish');
        Route::post('plots/{plot}/toggle-featured', [AdminPlotController::class, 'toggleFeatured'])->name('plots.toggle-featured');
        Route::post('plots/{plot}/status', [AdminPlotController::class, 'updateStatus'])->name('plots.status');
        Route::delete('plots/images/{image}', [AdminPlotController::class, 'deleteImage'])->name('plots.images.destroy');

        // Locations Management
        Route::resource('locations', AdminLocationController::class);

        // Plot Types Management
        Route::resource('plot-types', AdminPlotTypeController::class);

        // Enquiries CRM
        Route::resource('enquiries', AdminEnquiryController::class)->only(['index', 'show', 'update', 'destroy']);

        // Website Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
