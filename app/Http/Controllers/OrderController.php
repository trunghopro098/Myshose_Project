<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Categories;
use App\Models\ProductTypes;
class OrderController extends Controller
{
    public function __construct(){
        $category = Categories::where('status',1)->get();
        $producttype =  ProductTypes::where('status',1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order1 = Order::paginate(10);
        return view('admin.pages.ordercustomer',compact('order1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id =  $request->id;
        $status = $request->status;
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
         return response()->json(['success' => 'Xóa thành công']);
    }
    public function viewOrder(Request $request,$id){
        $order = OrderDetail::where('idOrder',$id)->get();
      
        return view('admin.pages.OrderDetail',compact('order'));

    }
    public function bought($id){
        $bought  = Order::where('idUser',$id)->where('status',2)->get();
        return view('client.pages.damua',compact('bought'));
    }
        public function viewOrderClient(Request $request,$id){
        $order = OrderDetail::where('idOrder',$id)->get();
      
        return view('client.pages.ViewDetail',compact('order'));

    }
}
