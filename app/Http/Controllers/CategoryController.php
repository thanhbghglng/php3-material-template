<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

        $category=Category::select('id','name','status','parent_id','description')
        ->orderBy('id','DESC')
        ->with('parent')
        ->paginate(5);
        // dd($category);
        // ->get();
        return view('pages.category.category',['categories'=>$category]);
    }
    public function show(){
        return view('pages.category.category');
    }
    public function create(){
        $category= Category::select('id','name')
        ->get();
        // dd($category);
        return view('pages.category.create',['category_parent'=>$category]);
    }
    public function store(Request $request){
        $categoryRequest = $request->all();
        $categories= new Category();
        $categories->name = $categoryRequest['name'];
        $categories->description = $categoryRequest['description'];
        $categories->parent_id = $categoryRequest['parent_id'];
        $categories->status = $categoryRequest['status'];
        // dd($categories);
        $categories->save();
        return redirect()->route('category.index');
        
    }
    public function edit(Category $id){
        $category= Category::select('id','name')
        ->where('id','!=',$id->id)
        ->get();
        // dd($category);  
        return view('pages.category.create',['category'=>$id,'category_parent'=>$category]);
    }
    public function update(Request $request,Category $id){
            $categories = $id;
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->status = $request->status;
            $categories->parent_id = $request->parent_id;
            // dd($categories);
            $categories->save();
            return redirect()->route('category.index');
          
    }
    public function delete(Category $id){
        if($id->delete()){
            return redirect()->route('category.index');
        }
    }
}
