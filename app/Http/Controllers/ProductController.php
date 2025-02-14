<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(StoreProductRequest $request){


            // Validate the request data
            $validated = $request->validated();


            // Create the product
            $product = Product::create(['sku' => $validated['sku']]);

            // Attach translations
            $product->translations()->createMany($validated['translations']);

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product->load('translations')
            ], 200);
    }
    public function index(Request $request){
        $locale = $request->header('locale','en');
        $products = Product::all();

        $products->each(function ($product) use ($locale) {
            $product->setAttribute('name', $product->getTranslation('name', $locale));
            $product->setAttribute('description', $product->getTranslation('description', $locale));
        });
        return response()->json([
            'success' => true,
            'products' => $products
        ], 200);
    }
}
