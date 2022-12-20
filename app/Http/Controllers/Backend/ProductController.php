<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->get();

        return response()->json([
            "status" => true,
            "message" => "Successfully get all product",
            "data" => $products
        ]);
    }

    public function create()
    {
        return view('frontend.product.add');
    }

    public function show($id)
    {
        $product = Product::query()
                    ->where('id', $id)
                    ->first();

        if($product == null) {
            return response()->json([
                "status" => false,
                "message" => "Product not found",
                "data" => null,
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully get all product",
            "data" => $product
        ]);   
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        // dd($payload);
        if(!isset($payload['nama'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada nama",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['harga'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada harga",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['deskripsi'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada deskripsi",
                "data" => null
            ]);   
        }

        if($request->hasFile("image")) {
            $image_name = $request->file("image")->getClientOriginalName();
            $payload["image"] = $image_name;
            $payload["image_path"] = 'storage/' . $request->file("image")->store("images_product", 'public');
        }

        $product = Product::query()->create($payload);
        
        return response()->json([
            "status" => true,
            "message" => "Berhasil membuat sebuah product",
            "data" => $product->makeHidden([
                'id',
                'created_at',
                'updated_at'
             ])
        ]);   
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        $product = Product::query()->findOrFail($id);
        // dd($product);

        if($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null
            ]);
        }

        // dd($product);

        if($request->hasFile("image")) {
            isset($product->image_path) ? unlink(public_path($product->image_path)) : false;
            $image_path = 'storage/' . $request->file('image')->store('images_product', 'public');
        }
        

        $product->update([
            'nama' => isset($payload['nama']) ? $payload['nama'] : $product->nama,
            'harga' => isset($payload['harga']) ? $payload['harga'] : $product->harga,
            'deskripsi' => isset($payload['deskripsi']) ? $payload['deskripsi'] : $product->deskripsi,
            'rating' => isset($payload['rating']) ? $payload['rating'] : $product->rating,
            "image" => file_exists($product->image_path) ? $product->image : $request->file("image")->getClientOriginalName(),
            "image_path" => file_exists($product->image_path) ? $product->image_path : $image_path
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully updated product',
            'data' => $product->makeHidden([
               'id',
               'created_at',
               'updated_at'
            ])
        ]);
    }

    public function destroy($id)
    {
        $product = Product::query()->where('id', $id)->first();
        if($product == null) {
            return response()->json([
                "status" => false,
                "message" => "Product not found",
                "data" => null
            ]);
        }

        file_exists($product->image_path) ? 
        unlink(public_path($product->image_path)) : false;

        $product->delete();

        return response()->json([
            "status" => true,
            "message" => "Product berhasil dihapus",
            "data" => null
        ]);
    }


}
