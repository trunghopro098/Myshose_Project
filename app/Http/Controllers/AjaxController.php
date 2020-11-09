<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
class AjaxController extends Controller
{
    public function getProductType(Request $request){
    	// ajax gủi idCate sang
    	$category = Categories::find($request->idCate);
    	$producttype = ProductTypes::where('idCategory',$request->idCate)->get();
    	return response()->json($producttype,200);
    }
}
