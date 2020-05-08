<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetails;

use  App\Http\Resources\OrderDetailCollection;
use Validator;


class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OrderDetailCollection(OrderDetails::paginate(10));

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
           $orderDetail = OrderDetails::create($request->all());
           return response()->json($orderDetail,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail =orderDetails::find($id);
        if (is_null($orderDetail)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($orderDetail,200);
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
        $orderDetail =orderDetails::find($id);
        if (is_null($orderDetail)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $orderDetail->update($request->all());
        return response()->json($orderDetail,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderDetail =orderDetails::find($id);
        if (is_null($orderDetail)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $orderDetail->delete();
        return response()->json(["message"=>"Record deleted "],204);
    }
}
