<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd(\Auth::user()->id);
        return view('back-end.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('back-end.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($request->password);
        $user_id = User::create($data)->id; //create User Table

        $user = User::find($user_id);
        $user->role()->attach($request->role_id);//create record RoleUser Table
        
        return redirect()->route('users.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::all();
        foreach($orders as $order){
            if ($id == $order->user_id) {
                return redirect()->back()->with(['error' => 'Người dùng này đang có đơn đặt hàng, không thể xoá']);
            }
        }
        if(\Auth::user()->id == $id){
            return redirect()->back()->with(['error' => 'Không thể xoá']);
        }
        User::find($id)->delete();
        return redirect()->route('users.index')->with('status', 'Xoá thành công');
    }
}
