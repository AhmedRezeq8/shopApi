<?php

namespace App\Http\Controllers;

use App\Stores;
use Illuminate\Http\Request;
use Validator;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Stores::paginate(10);

        return response()->json($productList, 200);

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
            'Name' => 'required|min:2',
            'user_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $Store = Stores::create($request->all());
        return response()->json($Store, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Store =Stores::find($id);
        if (is_null($Store)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($Store,200);
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
        $Store =Stores::find($id);
        if (is_null($Store)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $Store->update($request->all());
        return response()->json($Store,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Store =Stores::find($id);
        if (is_null($Store)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $Store->delete();
        return response()->json(["message"=>"Record deleted "],204);
    }
}
