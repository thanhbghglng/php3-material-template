<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

        $category=Category::select('id','name','status','parent_id')
        ->paginate(5);
        // dd($category);
        // ->get();
        return view('pages.category',['categories'=>$category]);
    }
    public function show(){
        return view('pages.category');
    }
    public function delete(Category $id){
        if($id->delete()){
            return redirect()->route('category.index');
        }
    }
}
