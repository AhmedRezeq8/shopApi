<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Http\Resources\CartCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CartCollection(carts::paginate(20));
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
            'user_id' => 'required',
            'storeProduct_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $cart = Carts::create($request->all());
        return response()->json($cart, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cart = Carts::find($id);
        if (is_null($cart)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($cart, 200);

    }

    public function cartByUserId($userid)
    {
        $cart = DB::table('carts')
            ->join('store_products', 'carts.storeProduct_id', '=', 'store_products.id')
            ->join('products', 'store_products.product_id', '=', 'products.id')
            ->select('store_products.*', 'products.*', 'carts.*')
            ->where('carts.user_id', '=', $userid)
            ->groupBy('products.id')
            ->paginate(100);

        return response()->json($cart, 200);

    }
    public function cartByStoreProductId($storeProductid)
    {
        if (Carts::where('carts.storeProduct_id', '=', $storeProductid)->exists()) {
            return '1';
        } else {
            return '0';
        }

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
        $cart = Carts::find($id);
        if (is_null($cart)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $cart->update($request->all());
        return response()->json($cart, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Carts::find($id);
        if (is_null($cart)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $cart->delete();
        return response()->json(["message" => "Record deleted "], 204);
    }
}
