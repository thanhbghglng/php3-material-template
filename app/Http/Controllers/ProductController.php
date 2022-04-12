<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $productGet = Product::select('id','name','description','price','image_url','category_id','status')
        ->with('categories:id,name')
        ->paginate(10);
        // dd($productGet);
        return view('pages.product.product',['products'=>$productGet]);
    }
    public function create(){
        return view('pages.product.create');
    }
    public function edit(Product $id){
        $product= $id;
        return view('pages.product.create',['product'=>$product]);
    }
    public function delete(Product $id){
        if($id->delete()){
            return redirect()->route('product.index');
        }
    }
}
