<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['products']=Products::paginate(5);
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_data=request()->except('_token');

        if ($request->hasFile('Image_path')) {
            # code...
            $product_data['Image_path']=$request->file('Image_path')->store('uploads', 'public');
        }
        //$product_data=request()->all();
        Products::insert($product_data);
        //return response()->json($product_data);
        return redirect('productos')->with('Message','Producto agregado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::findOrFail($id);

        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product_data=request()->except(['_token','_method']);
        
         if ($request->hasFile('Image_path')) {
            # code...
            $product = Products::findOrFail($id);
            Storage::delete('public/'.$product->Image_path);
            $product_data['Image_path']=$request->file('Image_path')->store('uploads', 'public');
        
        }
        Products::where('id','=',$id)->update($product_data);

        //$product = Products::findOrFail($id);
        //return view('products.edit', compact('product'));
        return redirect('productos')->with('Message','Producto modifiado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Products::findOrFail($id);
        if(Storage::delete('public/'.$product->Image_path)){
            Products::destroy($id);
        }
        
        return redirect('productos')->with('Message','Producto eliminado con exito.');
    }
}
