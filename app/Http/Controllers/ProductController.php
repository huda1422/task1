<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
 
    public function index()
    {
        return Product::all(); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer', 
            'price' => 'required|numeric', 
            'image' => 'nullable|string', 
        ]);

  
        return Product::create($request->all());
    }


    public function show($id)
    {
        $product = Product::find($id); 
        if ($product) {
            return $product; 
        } 
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id); 
        if ($product) {
            
            return $product; 
        } 
    }

    public function destroy($id)
    {
        $product = Product::find($id); 
        if ($product) {
            $product->delete(); 
            return response()->json(['message' => 'Product deleted successfully']); 
        }
    }
}
