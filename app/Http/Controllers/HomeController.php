<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Order;
use App\Models\Customer;
use App\Models\News;
use App\Models\Order_detail;
use App\Models\Product_detail;
use App\Models\Comment;
use App\Models\Rating_star;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use Auth;
use Mail;
use Session;
use DB;

/**
 * summary
 */

class HomeController extends Controller
{
    /**
     * summary
     */
    public function index()
    {
        $product= Product::where('status',1)->where('quantity','>',0)->get();
        $productnew= Product::where('status',1)->where('quantity','>',0)->orderBy('created_at','DESC')->limit(8)->get();
        $productsale=Product::where('status',1)->where('sale_price','>',0)->where('quantity','>',0)->orderBy('sale_price','DESC')->limit(8)->get();
        $pro= Product::where('status',1)->where('quantity','>',0)->get();
        $cat= Category::where('status',1)->get();
        $slide= Slide::where('status',1)->get();
        $ord= Order::all();
        
        $test = DB::table('order_detail1')
        ->select(DB::raw('count(id_product) as number, id_product'))->groupBy('id_product')->orderBy('number','DESC')->limit(12)->get();   
        // dd($test);

        return view('layout.shop.home',compact('pro','cat','slide','productnew','productsale', 'ord','product','test'));
    }
    
    public function getinfor($id){
        $product = Product::find($id);
        return json_encode($product);  
    }

    public function getProduct(){
        $pro= Product::where('status',1)->where('quantity','>',0)->get();
        $cat= Category::where('status',1)->get();
        return view('layout.shop.product',compact('pro','cat'));
    }

    public function checkOut(Request $req){
        return view('layout.shop.checkout');
    }

    public function postcheckOut(Request $req, CartHelper $cart){
            $order= Order::create([
                'id_customer'=>Auth::guard('custo')->user()->id,
                'status'=> '0'
            ]);
        foreach ($cart->items as $value) {
            $order_detail = Order_detail::create([
                'status'=>$order->status,
                'id_order'=> $order->id,
                'id_product'=> $value['id'],
                'quantity'=> $value['quantity'],
                'price'=> $value['price'] * $value['quantity'],
                'receiver'=>$req->receiver,
                'phone_receiver'=>$req->phone_receiver
            ]);
        }
        foreach ($cart->items as $value) {
            
           DB::table('products')->where('id',$value['id'])->decrement('quantity', $value['quantity']); 
       }
       
       $data=[
         'name'=>$req->name,
         'email'=>$req->email
     ];
     $email=[
        'oragoon3003@gmail.com',
        $data['email']
    ];
    Mail::send('layout.shop.viewmail',$data,function($mes) use($data, $email, $cart){
        $mes->from('Oragoon3003@gmail.com');
        $mes->to($email,'viewmail')->subject('THƯ THÔNG BÁO ĐẶT HÀNG TẠI CỦA HÀNG NỘI THẤT NQL');
    });
    $linh= $req->email;
    $cart->clear();

    return view('layout.shop.goiy', compact('linh'))->with('thongbao','Bạn đã đặt hàng thành công!!!');
}

public function dangnhap(){
    return view('layout.layouts.login_cus');
}

public function post_dangnhap(Request $req){
    if(Auth::guard('custo')->attempt($req->only('email','password'))){
        return redirect()->route('home');
            // dd("hahahahahah");
    }
    else{
        return redirect()->back()->with('thatbai','Sai tài khoản!');
            // dd("huhuhuhuhu");
    }
}

public function dangxuat(CartHelper $cart){
    Auth::logout();
    Session::flush();
    $cart->clear();
    return redirect()->route('home');
}

public function dangky(){
    return view('layout.layouts.register_cus');
}
public function post_dangky(Request $req){
    $this->validate($req,[
        'name'=>'required',
        'email'=>'required|email|unique:customers',
        'phone_number'=>'required|max:10',
        'address'=>'required|max:255',
        'password'=>'required|min:6',
        'confirm_password'=>'required|same:password'
    ],[
        'name.required'=>'Tên không được để trống',
        'email.required'=>'Email không được để trống',
        'email.email'=>'Email sai định dạng',
        'email.unique'=>'Email đã tồn tại',
        'phone_number.required'=>'Số điện thoại không được để trống',
        'phone_number.integer'=>'Số điện thoại phải là kiểu số',
            // 'phone_number.max'=>'Số điện thoại không quá 10 số',
        'address.required'=>'địa chỉ không được để trống',
        'address.max'=>'địa chỉ không quá 255 ký tự',
        'password.required'=>'mật khẩu không được để trống',
        'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
        'confirm_password.required'=>'xác nhận mật khẩu không được để trống',
        'confirm_password.same'=>'Mật khẩu không khớp'

    ]);
    $pass= bcrypt($req->password);
    $req->merge(['password'=>$pass]);
    $acc= Customer::create([
        'name'=>$req->name,
        'email'=>$req->email,
        'phone_number'=>$req->phone_number,
        'address'=>$req->address,
        'password'=>$req->password,
        'confirm_password'=>$req->confirm_password
    ]);
    if($acc){
        return redirect()->route('dang_nhap');
    }
}

public function gioithieu(){
    return view('layout.shop.about');
}

public function lienhe(){
    return view('layout.shop.contact');
}

public function search(Request $req)
{
    $product= Product::where('status',1)->where('quantity','>',0)->where('name','like','%'.$req->key.'%')
    ->orWhere('price',$req->key)
    ->get();
    return view('layout.shop.search',compact('product'));
}

public function new(){
    $tintuc= News::where('status', 1)->get();
    return view('layout.shop.tintuc', compact('tintuc'));

}

public function product_detail($id){
    $product= Product::find($id);
    $star=Rating_star::where('id_product',$product->id)->avg('rating_star');
    // dd($star);
    $prod= Product::where('id_category', $product->id_category)->get();
    $product_detail= Product_detail::where('id_product',$id)->first();
    $cus= Customer::all();
    $demsao = DB::table('rating_star_product')
        ->select(DB::raw('count(id) as number, rating_star'))->where('id_product',$id)->groupBy('rating_star')->get(); 
        // dd($demsao);
    return view('layout.shop.product-detail', compact('product','product_detail','prod','cus','demsao','star'));
}

public function postComment($id, Request $req){
    $this->validate($req,[
        'NoiDung'=> 'required',
    ],[
        'NoiDung.required'=>'hãy bình luận về sản phẩm!',
    ]);
    $produc= Product::find($id);
    $comment= Comment::create([
        'id_product'=> $id,
        'id_customer'=> Auth::guard('custo')->user()->id,
        'content'=>$req->NoiDung
    ]);
    if ($comment) {
        return redirect("product_detail/$id")->with('thongbao','Bình luận sản phẩm thành công!');
    }
}

public function rating_star($id, Request $req){
    $this->validate($req,[
            'content_rating'=> 'required',
            'rating_star'=> 'required'
            
        ],[
            'content_rating.required'=>'viết đánh giá của bạn về sản phẩm của chúng tôi!',
            'rating_star.required'=>'hãy đánh giá xem sản phẩm của chúng tôi đạt mấy sao!'
            
        ]);
    $rating= Rating_star::create([
        'id_product'=> $id,
        'id_customer'=> Auth::guard('custo')->user()->id,
        'rating_star'=>$req->rating_star,
        'content_rating'=>$req->content_rating
    ]);
    // dd($rating);
    
    if ($rating) {
        // return redirect("product_detail/$id")->with( ['demsao' => $demsao] )->with('thanhcong','đáng giá sản phẩm thành công!');
        return redirect("product_detail/$id")->with('thanhcong','đáng giá sản phẩm thành công!');
    }
    
}
}

?>
