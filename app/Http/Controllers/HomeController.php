<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Models\Product;
use Cart;
use Auth;
class HomeController extends Controller
{
    // dung view share đổ dư r liwwuj ra menu
public function __construct(){
        $category = Categories::where('status',1)->get();
        $producttype =  ProductTypes::where('status',1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype ]);
    }
    public function index(){
    	$product = Product::where('status',1)->where('promotional','>',0)->paginate(6); 
    	$product1= Product::where('status',1)->orderBy('created_at', 'desc')->paginate(6);
        $product2= Product::where('status',1)->paginate(6);     
        return view('client.pages.index',['nike' => $product,'hotproduct'=>$product1,'allproduct'=>$product2]);
    }
    // ddỏ san pham ra khi chọn trên thanh menu
    public function productype($id){
       
        $productype = Product::where('status',1)->where('idProductType',$id)->get();
        $productype1 = Product::where('status',1)->where('idProductType','<>',$id)->paginate(9);
        $pro1 = ProductTypes::where('id',$id)->get();
       
        return view('client.pages.producttype',['types'=>$productype,'types1'=>$productype1,'proty'=>$pro1]);
    }
    public function category($id){
         $productcate = Product::where('status',1)->where('idCategory',$id)->paginate(12);
          $catego = Categories::where('id',$id)->paginate(12);  
        return view('client.pages.category',['cate'=> $productcate,'ca'=>$catego]);
    }
    public function getDetail($slug){
        $productDetail = Product::where('slug', $slug)->first();
        // $idProType = ProductTypes::where('slug', $slug)->first();
        
  
            return view('client.pages.detail', ['product' => $productDetail]);
        
        // else if( count($idProType) > 0 ) {
        //     $productByProdType = Product::where('idProductType', $idProType->id)->get();
        //     return view('client.pages.detail_protype', ['product' => $productByProdType, 'producttype' => $idProType]);
        // }
    }
    public function search(Request $request){
        $search = Product::where('name','like','%'.$request->key.'%')->orwhere('price',$request->key)->paginate(4);
        $dmsp = Categories::where('status',1)->get();
        return view('client.pages.search',compact('search','dmsp'));
    }
        public function adminsearch(Request $request){
        $search = Product::where('name','like','%'.$request->key.'%')->orwhere('price','like',$request)->paginate(4);
        return view('admin.pages.search',compact('search'));
    }

}
