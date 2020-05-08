<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
// use App\User;
use App\Users;
use Illuminate\Http\Request;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(Users::paginate(10));

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
        $User = Users::create($request->all());
        return response()->json($User, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User =Users::where('fBase_id',$id)->first();
        if (is_null($User)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($User,200);
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
        $User =Users::find($id);
        if (is_null($User)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $User->update($request->all());
        return response()->json($User,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User =Users::find($id);
        if (is_null($User)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $User->delete();
        return response()->json(["message"=>"Record deleted "],204);
    }
}
