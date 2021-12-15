<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => $userId,
            'rent' => $request->rent,
            'security' => $request->security,
            'status' => isset($request->status) ? 'Active' : 'Inactive'
        ];

        $product = Product::create($data);
        $productMeta = [];
        $thumbnail = $request->thumbnail_image;        
        for($i = 1; $i <=5; $i++) {
            if ($request->hasFile('image'.$i)) {
                $file = $request->file('image'.$i);
                $path = $file->store('products', 's3');
                $url = Storage::disk('s3')->url($path);
                $productMeta[] = [
                    'product_id' => $product->id,
                    'file' => basename($path),
                    'url' => $url,
                    'type' => ($thumbnail == $i) ? 'thumbnail' : 'gallery'
                ];
            }
        }

        if (count($productMeta)) {
            ProductImage::insert($productMeta);
        }
         
        return 'success';
    }
}
