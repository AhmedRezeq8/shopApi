<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserTypeCollection;
use App\UserType;
use Illuminate\Http\Request;
use Validator;
class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserTypeCollection(UserType::paginate(10));

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
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $userType = UserType::create($request->all());
        return response()->json($userType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userType = UserType::find($id);
        if (is_null($userType)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($userType, 200);
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
        $UserType = UserType::find($id);
        if (is_null($UserType)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $UserType->update($request->all());
        return response()->json($UserType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $UserType = UserType::find($id);
        if (is_null($UserType)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        $UserType->delete();
        return response()->json(["message" => "Record deleted "], 204);
    }
}
