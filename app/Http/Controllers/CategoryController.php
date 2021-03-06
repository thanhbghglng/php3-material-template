<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

        $request->validate([
            'name' => 'required',

        ]);
        $categoryRequest = $request->all();
        $categories= new Category();
        $categories->name = $categoryRequest['name'];
        $categories->description = $categoryRequest['description'];
        $categories->parent_id = $categoryRequest['parent_id'];
        if ($request['status']) {
            $categories->status = $categoryRequest['status'];
            
        }
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
        $request->validate([
            'name' => 'required',
            
        ]);
            $categories = $id;
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->status = $request->status;
            $categories->parent_id = $request->parent_id;
            // dd($categories);
            $categories->save();
            return redirect()->route('category.index');
          
    }
    public function delete(Request $request){
       $category= Category::find($request->category_delete_id);
       $product = Product::select('id','name','status','category_id')
       ->where('category_id','=',$category->id)
       ->get();
        foreach ($product as $item) {
            $item->status  = 0;
            
        }
       $category->delete();
       return redirect()->back();
    }
    public function changeStatus(Request $request){
       $category = Category::find($request->category_id);

        $category->status = $request->status;
        $category->save();
        return redirect()->back();
    }
}
