<?php

namespace App\Providers;

use App\Product;
use App\ProductFeatures;
use App\SectionDescription;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $products=Product::get();
            $features=ProductFeatures::get();
            $sectionDescriptions=SectionDescription::get();
            // $pricingDescription='';
            // foreach ($sectionDescriptions as $item) {
            //     if ($item->section_name=='pricing') {
            //         $pricingDescription=$item->description;
            //     }
            // }
            $free_plan_price=0;
            $business_plan_price=0;
            $developer_plan_price=0;
            foreach ($products as $item) {
                if ($item->id==1) {
                    $free_plan_price=$item->price;
                }elseif($item->id==2){
                    $business_plan_price=$item->price;
                }
                elseif($item->id==3){
                    $developer_plan_price=$item->price;
                }
            }


            $view->with('sectionDescriptions', $sectionDescriptions);
            $view->with('products', $products);
            $view->with('features', $features);
            $view->with('free_plan_price', $free_plan_price);
            $view->with('business_plan_price', $business_plan_price);
            $view->with('developer_plan_price', $developer_plan_price);
        });
    }
}
