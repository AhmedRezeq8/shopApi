<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use  App\Http\Resources\OrderCollection;
use Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OrderCollection(Orders::paginate(10));

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
            // 'user_id' =>'required',
            // 'store_id' =>'required',
            // 'shipName' =>'required|min:5',
           ];
           $validator = Validator::make($request->all(),$rules);
           if ($validator->fails()) {
               return response()->json($validator->errors(),400);
           }
           $order = Orders::create($request->all());
           return response()->json($order,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order =Orders::find($id);
        if (is_null($order)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($order,200);
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
        $order =Orders::find($id);
        if (is_null($order)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $order->update($request->all());
        return response()->json($order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $order =Orders::find($id);
        if (is_null($order)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $order->delete();
        return response()->json(["message"=>"Record deleted "],204);

    }
}
