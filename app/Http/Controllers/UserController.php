<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $users = User::find(auth()->user()->id);


        return view('account', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd('yes');
        // $users = User::find(auth()->user()->id);
        $users=new User();
        //dd($users);
        $fileName = $request->file('file')->store('postimages', 'public');
        
        $data = [
            'name'=> $request->name,
            'email'=> $request->email,


            'phone_no'=> $request->phone1,
            'address_1'=> $request->add1,
            'address_2'=> $request->add2,
            'city_id'=> $request->city_id,
            'state_id'=> $request->state_id,
            'country_id'=> $request->country_id,
            'zip_code'=> $request->zip_code,
            'profile_pic'=>$fileName,
            'status'=>'true',
            'role_id'=> 'user',
        ];
        $users->where('id', auth()->user()->id)->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
