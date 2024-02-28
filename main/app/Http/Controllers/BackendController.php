<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductFeatures;
use App\SectionDescription;
use Illuminate\Http\Request;

function checkIsNull($item)
{
    if ($item) {
        return 'on';
    } else {
        return "off";
    }
}
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

            $totalFeaturesCount = ProductFeatures::all();
            foreach ($totalFeaturesCount as $key => $value) {
                $featureIndex = $key+ 1;
                $products_feature = ProductFeatures::find($value->id);
                $featureIndex = "feature$key";
                $basicIndex = "basic$key";
                $businessIndex = "business$key";
                $developerIndex = "developer$key";
                $products_feature->update([
                    'feature_name' => $request->$featureIndex,
                    'isBasic' => checkIsNull($request->$basicIndex),
                    'business' => checkIsNull($request->$businessIndex),
                    'developer' => checkIsNull($request->$developerIndex),
                ]);
            }
            // for ($i = 0; $i < $totalFeaturesCount; $i++) {
            //     $featureIndex = $i + 1;
            //     $products_feature = ProductFeatures::find($featureIndex);
            //     $featureIndex = "feature$i";
            //     $basicIndex = "basic$i";
            //     $businessIndex = "business$i";
            //     $developerIndex = "developer$i";
            //     $products_feature->update([
            //         'feature_name' => $request->$featureIndex,
            //         'isBasic' => checkIsNull($request->$basicIndex),
            //         'business' => checkIsNull($request->$businessIndex),
            //         'developer' => checkIsNull($request->$developerIndex),
            //     ]);
            // }

            $product1 = Product::find(1);
            $product2 = Product::find(2);
            $product3 = Product::find(3);
            // dd($product1);
            $product1->update([
                'price' => $request->free_plan_price,
            ]);
            $product2->update([
                'price' => $request->business_plan_price,
            ]);
            $product3->update([
                'price' => $request->developer_plan_price,
            ]);
        } else {
            dd($request->all());
        }
        return back();

    }

    // public function deleteFeature($id) {
    //     // dd($id);
    //     ProductFeatures::find($id)->delete();
    //     return back();
    // }
    public function deleteFeature1($id) {
        // dd($id);
        ProductFeatures::find($id)->delete();
        return back();
    }
    public function addFeature(Request  $request) {
        ProductFeatures::create([
            'feature_name'=>$request->feature_name,
            'isBasic'=>checkIsNull($request->isBasic),
            'business'=>checkIsNull($request->isBusiness),
            'developer'=>checkIsNull($request->isDeveloper),
        ]);
        // dd($request->all());
        // ProductFeatures::find($id)->delete();
        return back();
    }
}
