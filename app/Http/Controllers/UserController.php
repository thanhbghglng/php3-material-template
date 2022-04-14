<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    // public function index(User $model)
    // {
    //     return view('users.index', ['users' => $model->paginate(15)]);
    // }
    public function index()
    {
        $users = User::select('id','name','email','status')
        ->paginate(15);
        return view('dashboard',['users'=>$users]);
    }
    public function create(){
        return view ('users.create');
    }
    public function store(Request $request){

    }
    public function edit( User $id){
            $users= $id;
        return view('users.create',['users'=>$users]);
    }
    public function changeStatus(Request $request){
        $users = User::find($request->id);
         $users->status = $request->status;
         $users->save();
         return redirect()->back();
     }





    public function delete(Request $request){
        $users= User::find($request->user_delete_id);
        $users->delete();
        return redirect()->route('users.index');
    }
  
}
