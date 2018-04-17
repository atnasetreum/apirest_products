<?php

namespace App\Http\Controllers\API;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Products::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:200',
            'sku'   => 'required|max:10',
            'price' => 'required|max:8',
            'stock' => 'required|max:10'
        ]);

        $product        = new Products();
        $product->name  = $request->name;
        $product->sku   = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return response()->json([$product], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Products::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name'  => 'required|max:200',
            'sku'   => 'required|max:10',
            'price' => 'required|max:8',
            'stock' => 'required|max:10'
        ]);

        $product->name  = $request->name;
        $product->sku   = $request->sku;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return response()->json([$product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json([$product], 200);
    }
}
