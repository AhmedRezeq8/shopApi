<?php

namespace App\Http\Controllers;

use App\StoreProducts;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\StoreProductCollection;


class StoreProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $productList = StoreProducts::paginate(10);

        // return response()->json($productList, 200);
        return new StoreProductCollection(StoreProducts::paginate(10));
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
            'store_id' => 'required',
            'product_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $storeProducts = StoreProducts::create($request->all());
        return response()->json($storeProducts, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $storeProducts =StoreProducts::find($id);
        if (is_null($storeProducts)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($storeProducts,200);
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
        $storeProducts =StoreProducts::find($id);
        if (is_null($storeProducts)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $storeProducts->update($request->all());
        return response()->json($storeProducts,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storeProducts =StoreProducts::find($id);
        if (is_null($storeProducts)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $storeProducts->delete();
        return response()->json(["message"=>"Record deleted "],204);
    }
}
