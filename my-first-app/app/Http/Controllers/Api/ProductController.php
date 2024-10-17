<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::get();
        if($products->count() > 0){
            return ProductResource::collection($products);
        }
        else{
            return response()->json(['message' => 'No record available'],404);
        }
    }

    public function store(Request $request){

        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(['message' => 'Bad Request', 'error' => $validate->messages()],400);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Product created Successfully!',
            'data' => new ProductResource($product)
        ],200);
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product){
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(['message' => 'Bad Request', 'error' => $validate->messages()],400);
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Product updated Successfully!',
            'data' => new ProductResource($product)
        ],200);
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json([
            'message' => 'Product deleted!'
        ],200);
    }
}
