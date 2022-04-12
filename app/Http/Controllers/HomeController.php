<?php

namespace App\Http\Controllers;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::select('id','name','email','status')
        ->paginate(15);
        return view('dashboard',['users'=>$users]);
    }
    public function create(){
        return view ('users.create');
    }

    public function delete(User $id){
        if($id->delete()){
            return redirect()->route('users.index');
        }
    }
}
