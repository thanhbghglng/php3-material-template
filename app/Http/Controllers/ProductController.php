<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    //
    public function index(){
        $productGet = Product::select('id','name','description','price','image_url','category_id','status')
        ->with('categories:id,name')
        ->orderBy('id','DESC')
        ->paginate(10);
        // dd($productGet);
        return view('pages.product.product',['products'=>$productGet]);
    }
    public function create(){
        $category= Category::select('id','name')
        ->get();
        return view('pages.product.create',['category'=>$category]);
    }
    public function store (Request $request){
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            
            
        ]);
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('image_url')){
            $file = $request->image_url;
            $fileHashName = $file->hashName();
            $fileName = $request->name.'_'.$fileHashName;
            $product->image_url = $file->storeAs('images/products', $fileName);
        }
        else {
            $product->image_url = '';
        }
        

        $product->save();
        return redirect()->route('product.index');
        
    }
    public function edit(Product $id){
        $product= $id;
        $category= Category::select('id','name')
        ->get();
        return view('pages.product.create',['product'=>$product,'category'=>$category]);
    }
    public function update(Request $request,Product $id){
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            
            
        ]);
        $product = $id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->image_url = $request->image_url;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('product.index');

        
    }
    public function delete(Request $request){
        $product= Product::find($request->product_delete_id);
       $product->delete();
       return redirect()->back();
    }
    public function changeStatus(Request $request){
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
        return redirect()->back();
    }
}
