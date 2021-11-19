<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Hobby;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hobby = Hobby::get();
        $city = City::get();
        return view('admin.users.create',compact('hobby','city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except(['_token','hobbies','password','submit']);
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        foreach($request->hobbies as $h){
            DB::table('user_hobbies')->insert([
                'user_id' => $user->id,
                'hobby_id' => $h,
            ]);
        }

        return redirect()->route('user.index')->with('success','User Created Successfully.');
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
    public function edit($id)
    {
        $hobby = Hobby::get();
        $city = City::get();
        $user = User::find($id);
        return view('admin.users.edit',compact('hobby','city','user'));
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
        $data = $request->except(['_token','hobbies','password','submit','_method']);
        $user = User::where('id',$id)->update($data);

        DB::table('user_hobbies')->where('user_id',$id)->delete();
        foreach($request->hobbies as $h){
            DB::table('user_hobbies')->insert([
                'user_id' => $id,
                'hobby_id' => $h,
            ]);
        }

        return redirect()->route('user.index')->with('success','User Updated Successfully.');
    }

    public function ChangeStatus(Request $request){
        $user = User::find($request->id);

        if($user->status == 'Approved'){
            $user->status = 'Unapproved';
            $text = 'Approve';
        }else{
            $user->status = 'Approved';
            $text = 'Unapproved';
        }
        $user->save();
        return response()->json(['success'=>'true','text'=>$text]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
		if ($delete) {
			return redirect()->route('user.index')->with('success', 'User deleted successfully.');
		} else {
			return redirect()->route('user.index')->with('message', 'User not deleted successfully.');
		}
    }
}
