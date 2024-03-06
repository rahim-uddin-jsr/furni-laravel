<?php

use App\Http\Middleware\UserRoutePermissionMiddleware;
use App\Product;
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
// Route::get('/hero', 'DashboardController@index')->name('dashboard');
// Add more authenticated routes here
// });
Route::get('hero', function () {
    return redirect('/#hero');
})->name('hero');
Route::get('about', function () {
    return redirect('/#about');
})->name('about-section');
Route::get('portfolio-home', function () {
    return redirect('/#portfolio');
})->name('portfolio-section');
Route::get('services-home', function () {
    return redirect('/#services');
})->name('services-section');
Route::get('team-section', function () {
    return redirect('/#team');
})->name('team-section');
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
        Route::post('addCategory', 'BackendController@addCategory')->name('addCategory');
        Route::put('updateCategory/{id}', 'BackendController@updateCategory')->name('updateCategory');
        Route::delete('deleteCategory/{id}', 'BackendController@deleteCategory')->name('deleteCategory');
        // Route::delete('users/{id}', ['BackendController@delete'])->name('users.delete');
        Route::put('/description/update', 'BackendController@updateDescription')->name('updateDescription');
        Route::delete('deletePortfolio/{id}', 'BackendController@deletePortfolio')->name('deletePortfolio');
        Route::put('updatePortfolio/{id}', 'BackendController@updatePortfolio')->name('updatePortfolio');
        Route::post('addPortfolio', 'BackendController@addPortfolio')->name('addPortfolio');
        Route::get('delete-portfolio-single-image/{id}', 'BackendController@deletePortfolioSingleImage')->name('deletePortfolioSingleImage');
        Route::put('update-portfolio-single-image/{id}', 'BackendController@updatePortfolioSingleImage')->name('updatePortfolioSingleImage');
        Route::get('make-image-primary/{id}', 'BackendController@makeImagePrimary')->name('makeImagePrimary');
    });

    Route::get('/portfolio-details/{id}', 'FrontendController@portfolioDetails')->name('portfoliodetails');
    // Add more authenticated routes here
});
