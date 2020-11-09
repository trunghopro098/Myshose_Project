<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductTypes;
use App\Http\Requests\StoreProductRequest;
use Validator;
use File;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('status',1)->paginate(2);
        return view('admin.pages.product.list',compact('product'));
    }
    // public function index()
    // {
    //     $n =  Carbon::now()->month; //tháng
    //            // $n =  Carbon::now()->year; //năm
    //     $product = Product::where('status',1)->where('created_at','$n')->paginate(2);
    //     return view('admin.pages.product.list',compact('product'));
    //     // dd($n);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        return view('admin.pages.product.add',compact('category','producttype'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        // kiemr tra image dduwocj guir tuwf client
        // kiểm tra hàm này có nhập flie chưa
        if($request->hasFile('image')){
            // láy ra biến file
            $file = $request->image;
            // lấy tên fie
            $file_name = $file->getClientOriginalName();
            //lấy loại file
            $file_type = $file->getMimeType();
            // lấy kích thước cảu file  down vij byte
            $file_size = $file->getSize();
            if($file_type  == 'image/png' || $file_type  == 'image/jpg' || $file_type  == 'image/jpeg' || $file_type  == 'image/gif'){
                if($file_size<= 1048576){
                    $file_name = date('d-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    if($file->move('img/upload/product',$file_name)){
                       $data = $request->all();
                       $data['slug'] = utf8tourl($request->name);
                       $data['image'] = $file_name;
                  
                       Product::create($data);
                       return redirect()->route('product.index')->with('thongbao','Đã thêm thành công');
                    }
                }
                else{
                    return back()->with('error','Không thể upload, ảnh lớn quá 1MegaByte');
                }       
            }
            else{
                    return back()->with('error','Không thể upload, file không phải là hình ảnh');
                }

    } else{
            return back()->with('error','Bạn chưa chọn ảnh minh họa cho sản phẩm');
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        $product = Product::find($id);
        return response()->json(['category'=>$category,'producttype'=>$producttype, 'product'=>$product],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $validator = Validator::make($request->all(),
            [
            'name' => 'required|min:2|max:255|',
            'description' => 'required|min:2',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'promotional' => 'numeric',
            'image' => 'image',
            ],[
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 2 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'numeric' => ':attribute phải là một số ',
            'image' => ':attribute không là hình ảnh',
            ],[
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Đơn giá sản phẩm',
            'promotional' => 'Giá khuyến mại',
            'image' => 'Ảnh minh họa',
            ]);
        if($validator->fails()){
            return response()->json(['error'=>'true','message'=>$validator->errors()],200);
        }
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = utf8tourl($request->name);
        if($request->hasFile('image')){
            // láy ra biến file
            $file = $request->image;
            // lấy tên fie
            $file_name = $file->getClientOriginalName();
            //lấy loại file
            $file_type = $file->getMimeType();
            // lấy kích thước cảu file  down vij byte
            $file_size = $file->getSize();
            if($file_type  == 'image/png' || $file_type  == 'image/jpg' || $file_type  == 'image/jpeg' || $file_type  == 'image/gif'){
                if($file_size<= 1048576){
                    $file_name = date('d-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    // neu datj ten file moiw thi lay $file->name vaf kg phai file moi thi lay ten file trng table product laf image
                    if($file->move('img/upload/product',$file_name)){
                       $data['image'] = $file_name;
                       // kieemr tra toonf tai
                       if(File::exists('img/upload/product/'.$product->image)){
                        //xoas file
                         unlink('img/upload/product/'.$product->image);
                       }
                    }
                }
                else{
                  return response()->json(['error' => 'ảnh của bạn lớn hơn 1MegaByte'],200);
                }       
            }
            else{
                   return response()->json(['error' => 'Không thể upload ảnh không phải định dạng của hình ảnh'],200);
                }

        }else{
             $data['image'] = $product->image;
        }
        $product->update($data);
        return response()->json(['result' => 'Đã sửa thành công sản phẩm có id là '.$id],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(File::exists('img/upload/product/'.$product->image)){
          unlink('img/upload/product/'.$product->image);
        }
        $product->delete();
        return response()->json(['result' => 'Đã xóa thành công sản phẩm có id là '.$id],200);
    }

}
