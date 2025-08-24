<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        $items = Product::all();
        return response()->json([
            'status' => 200,
            'items' => $items
        ]);
    }
    public function store(Request $request){
        $item = New Product();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully'
        ]);
    }

    public function edit(Request $request, $id)
{
    $item = Product::find($id);

    if (!$item) {
        return response()->json([
            'status' => 404,
            'message' => 'Product not found'
        ], 404);
    }

    $item->name = $request->name;
    $item->price = $request->price;
    $item->quantity = $request->quantity;
    $item->update();

    return response()->json([
        'status' => 200,
        'item' => $item
    ]);
}


public function delete($id)
{
    $item = Product::find($id);

    if (!$item) {
        return response()->json([
            'status' => 404,
            'message' => 'Product not found'
        ], 404);
    }

    $item->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Product deleted successfully'
    ]);

}
}
