<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Products;

use App\Http\Resources\ProductCollection;
use Validator;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new ProductCollection(Products::paginate(10));
        // $productList = Products::paginate(10);

        // return response()->json($productList,200);


        // $products = Products::all();
        // return view('products', compact('products'));


    }
    public function webindex()
    {

        $products = Products::all();

        return view('products', compact('products'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules = [
        'name' =>'required|min:2',
        'category_id' =>'required',
        'IsApproved' =>'required',
       ];
       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
           return response()->json($validator->errors(),400);
       }
       $product = Products::create($request->all());
       return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =Products::find($id);
        if (is_null($product)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($product,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =Products::find($id);
        if (is_null($product)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $product->update($request->all());
        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Products::find($id);
        if (is_null($product)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $product->delete();
        return response()->json(["message"=>"Record deleted "],204);
    }
}
