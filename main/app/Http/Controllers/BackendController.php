<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductFeatures;
use App\SectionDescription;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function updatePricing(Request $request)
    {
        // dd($request->all());
        $pricingDescription = SectionDescription::find($request->section_id);
        if ($pricingDescription) {
            # code...
            $pricingDescription->update([
                'description' => $request->section_description,
            ]);
            $products_features0 = ProductFeatures::find(1);
            $products_features1 = ProductFeatures::find(2);
            $products_features2 = ProductFeatures::find(3);
            $products_features3 = ProductFeatures::find(4);
            $products_features4 = ProductFeatures::find(5);
            function checkIsNull($item)
            {
                if ($item) {
                    return 'on';
                } else {
                    return "off";
                }
            }

// $totalFeaturesCount=ProductFeatures::count();
            // // dd($totalFeaturesCount);
            // for ($i=1; $i < $totalFeaturesCount+1; $i++) {
            //     $products_feature = ProductFeatures::find($i);
            //     // dd($products_feature);
            //     $products_feature->update([
            //         'feature_name'=>$request->feature.$i,
            //         'isBasic'=>checkIsNull($request->basic.($i-1)),
            //         'business'=>checkIsNull($request->business.($i-1)),
            //         'developer'=>checkIsNull($request->developer.($i-1)),
            //     ]);
            //     dd($i);
            // }
            $products_features0->update([
                'feature_name' => $request->feature0,
                'isBasic' => checkIsNull($request->basic0),
                'business' => checkIsNull($request->business0),
                'developer' => checkIsNull($request->developer0),
            ]);
            $products_features1->update([
                'feature_name' => $request->feature1,
                'isBasic' => checkIsNull($request->basic1),
                'business' => checkIsNull($request->business1),
                'developer' => checkIsNull($request->developer1),
            ]);
            $products_features2->update([
                'feature_name' => $request->feature2,
                'isBasic' => checkIsNull($request->basic2),
                'business' => checkIsNull($request->business2),
                'developer' => checkIsNull($request->developer2),
            ]);
            $products_features3->update([
                'feature_name' => $request->feature3,
                'isBasic' => checkIsNull($request->basic3),
                'business' => checkIsNull($request->business3),
                'developer' => checkIsNull($request->developer3),
            ]);
            $products_features4->update([
                'feature_name' => $request->feature4,
                'isBasic' => checkIsNull($request->basic4),
                'business' => checkIsNull($request->business4),
                'developer' => checkIsNull($request->developer4),
            ]);
            $product1 = Product::find(1);
            $product2 = Product::find(2);
            $product3 = Product::find(3);
            // dd($product1);
            $product1->update([
                'price' => $request->free_plan_price
            ]);
            $product2->update([
                'price' => $request->business_plan_price
            ]);
            $product3->update([
                'price' => $request->developer_plan_price
            ]);
        } else {
            dd($request->all());
        }
        return back();

    }
}
