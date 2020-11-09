<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use App\Models\Order;
use Auth;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user_count = User::count();
        $order_count = Order::count();
        $money = Order::where('status',2)->sum('monney');
        $or = Order::where('status',0)->count();
        $ordercus = Order::where('status',0)->paginate(10);

        return view('admin.pages.index',compact('user_count','order_count','money','or','ordercus'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function redirectProvider($social){
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social){
        $user= Socialite::driver($social)->user();

        // timf kiems hoac tao moi
        $authUser=$this->findOrCreateUser($user);
        Auth::login($authUser);
        return back()->with('thongbao','Đăng nhập thành công');
    }
    Private function findOrCreateUser($user){
        $authUser = User::where('social_id',$user->id)->first();
        if($authUser){
            return $authUser;

        }else{

        return  User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'social_id' => $user->id,
                'ruler' => 0,
                'status' => 0,
                'avatar' => $user->avatar,

                ]);
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return back()->with('thongbao','Đăng xuất thành công');
        }
    }
    public function updatepass(Request $Request){
        $this->validate($Request,[
            'password' => 'required|min:6|max:255',
            're_password' => 'required|same:password',
        ],[
            'password.required'=> 'Mật khẩu không dduocj để trống',
            'password.min'=> 'Mật khẩu ít nhất 6 kí tự',
            'password.max' => 'mật khẩu độ dài không quá 255 kí tự',
            're_password.required'=>'Không được bỏ trống',
            're_password.same' => 'Nhập lại mật khẩu chưa đúng',

        ]);
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($Request->password);
        $user->save();
        return back()->with('thongbao','Đã cập nhật thành công');

    }
    public function login(Request $Request){
        $data = $Request->only('email','password');
        if(Auth::attempt($data,$Request->has('remember'))){
            return back()->with('thongbao','Đăng nhập thành công');
        }else{
            return back()->with('error','Đăng nhập thất bịa xin vui lòng kiểm tra lại');
        }

    }
    public function register(Request $Request){
         $this->validate($Request,[
            'name' => 'required|min:2|max:255',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
            're_password' => 'required|same:password',
        ],[
            'name.required'=> 'Mật khẩu không được để trống',
            'name.min'=> 'Tên có độ dài từ 2 kí itujw trở lên',
            'name.max' => 'Tên có độ dài không qua 255 kí tự',
            'email.required'=>'Địa chỉ email không được bỏ trống',
            'email.email'=>'Email nhập không đúng định dạng',
            'email.unique'=>'Email đã tồn tại trong hệ thống',
            'password.required'=> 'Mật khẩu không được để trống',
            'password.min'=> 'Mật khẩu ít nhất 6 kí tự',
            'password.max' => 'mật khẩu độ dài không quá 255 kí tự',
            're_password.required'=>'Không được bỏ trống',
            're_password.same' => 'Nhập lại mật khẩu chưa đúng',

        ]);
         $data = $Request->all();
         $data['password'] = Hash::make($Request->password);
         User::create($data);
         // Auth::login($user);
         return back()->with('thongbao','Đăng kí tài khoản thành công');
    }
    public function loginAdmin(Request $request) {
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            if(Auth::user()->ruler == 1)
                return redirect('admin/')
                        ->with('thongbao','Đăng nhập thành công');
            else if(Auth::user()->ruler == 2)
                return redirect()
                    ->route('product.index')
                    ->with('thongbao','Đăng nhập thành công');
            else if(Auth::user()->ruler == 3)
                return redirect()
                        ->route('order.index')
                        ->with('thongbao','Đăng nhập thành công');
        }else{
            return redirect()
                    ->route('login.admin')
                    ->with('error','Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }

}
