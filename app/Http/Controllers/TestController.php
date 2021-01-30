<?php

namespace App\Http\Controllers;


use App\Product;
use App\Provider;
use Illuminate\Http\Request;
use PhpParser\Builder;

class TestController extends Controller
{
    public function get_broadband_price($provider,$product){
        try{
            $provider_id = Provider::where('name','like',$provider)->first();

            if(!empty($provider_id)){
                $product_id = Product::where('name','like',$product)->where('provider_id',$provider_id->id)->first();
                if(!empty($product_id)){
                    $price = Product::where('provider_id',$provider_id->id)->where('id',$product_id->id)->select('price')->first();
//                    print_r($product_id->id); exit();
                    if(!empty($price)){
                        return response()->json(['success'=>true , 'message'=>'Price displayed.', 'price'=>$price->price]);
                    }
                }
                else{
                    return response()->json(['success'=>true ,'message'=>'Product not found.']);
                }
            }
            else{
                return response()->json(['success'=>true , 'message'=>'Provider not found']);
            }

        }
        catch (\Exception $exception){
            return response()->json(['success'=>true , 'message'=>$exception->getMessage()]);
        }
    }

    public function get_energy_price($provider,$product,$product_variation){
        try{
            $provider_id = Provider::where('name','like',$provider)->first();

            if(!empty($provider_id)){
                $product_id = Product::where('name','like',$product)->where('provider_id',$provider_id->id)->first();
                if(!empty($product_id)){
                    $price = Product::where('provider_id',$provider_id->id)->where('parent_id',$product_id->id)->where('name','like',$product_variation)->select('price')->first();
                    if(!empty($price)){
                        return response()->json(['success'=>true , 'message'=>'Price displayed.', 'price'=>$price->price]);
                    }
                }
                else{
                    return response()->json(['success'=>true ,'message'=>'Product not found.']);
                }
            }
            else{
                return response()->json(['success'=>true , 'message'=>'Provider not found']);
            }

        }
        catch (\Exception $exception){
            return response()->json(['success'=>true , 'message'=>$exception->getMessage()]);
        }
    }

    public function update_energy_price(Request $request){
        try{
            $provider = $request->provider;
            $product = $request->product;
            $product_variation = $request->product_variation;
            $price = $request->price;
            $provider_id = Provider::where('name','like',$provider)->first();

            if(!empty($provider_id)){
                $product_id = Product::where('name','like',$product)->where('provider_id',$provider_id->id)->first();
                if(!empty($product_id)){
                    $price = Product::where('provider_id',$provider_id->id)->where('parent_id',$product_id->id)->where('name','like',$product_variation)->update(['price'=>$price]);
                    if($price){
                        return response()->json(['success'=>true , 'message'=>'Price Updated Successfully.']);
                    }
                }
                else{
                    return response()->json(['success'=>true ,'message'=>'Product not found.']);
                }
            }
            else{
                return response()->json(['success'=>true , 'message'=>'Provider not found']);
            }

        }
        catch (\Exception $exception){
            return response()->json(['success'=>true , 'message'=>$exception->getMessage()]);
        }
    }
}
