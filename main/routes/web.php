<?php

use App\Http\Controllers\BackendController;
use App\Http\Middleware\UserRoutePermissionMiddleware;
use App\Product;
use App\ProductFeatures;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', function () {
    $products = Product::with('features')->get();
    return $products;
}
)->name('products');

// Route::middleware('auth')->group(function () {
// Routes that require authentication
// Route::get('/dashboard',function () {
//     return view('layouts.dashboard');
// })->name('dashboard');
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Add more authenticated routes here
// });
Route::middleware([UserRoutePermissionMiddleware::class])->group(function () {
    // Routes that require authentication
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard.home');
        })->name('dashboard');

        Route::get('about', function () {
            return view('dashboard.about-update');
        })->name('about');
        Route::get('features', function () {
            return view('dashboard.features');
        })->name('features');
        Route::get('services', function () {
            return view('dashboard.services-update');
        })->name('services');
        Route::get('team', function () {
            return view('dashboard.team');
        })->name('team');
        Route::get('portfolio', function () {
            return view('dashboard.portfolio');
        })->name('portfolio');
        Route::get('contact', function () {
            return view('dashboard.contact');
        })->name('contact');
        Route::get('pricing', function () {
            return view('dashboard.pricing');
        })->name('pricing');
        Route::put('/pricing/update', 'BackendController@updatePricing')->name('dashboardUpdatePricing');
        // Route::get('deleteFeature/{id}', 'BackendController@deleteFeature')->name('deleteFeature');
        Route::delete('deleteFeature/{id}', 'BackendController@deleteFeature1')->name('deleteFeature1');
        Route::post('addFeature', 'BackendController@addFeature')->name('addFeature');
        // Route::delete('users/{id}', ['BackendController@delete'])->name('users.delete');
    });

    // Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Add more authenticated routes here
});
