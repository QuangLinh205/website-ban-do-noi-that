<?php 
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use DB;
use App\Helper\CartHelper;
use Illuminate\Http\Request;
/**
 * summary
 */

class CartController extends Controller
{
    public function show(){
        // dd($cart);
        return view('layout.shop.shoping-cart');
    }
    public function add(CartHelper $cart,$id){
        $product = Product::find($id);
        $cart->add($product);
// dd(session('cart'));
        // dd($cart);
        return redirect()->back();
    }
    public function delete(CartHelper $cart, $id){
        $cart->delete($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, Request $req){
        $productupdate= DB::table('products')->select('quantity')->where('id', $req->id)->get();
        // dd($productupdate);
        $id= $req->id;
        $quantity= $req->quantity;
        // dd($quantity);
        foreach ($productupdate as $value) {
            if ($quantity==0) {
                return redirect()->route('show_cart')->with('soluongbang0','Số lượng phải hơn 0 sản phẩm!');
            }
            if($req->quantity <= $value->quantity){
                $cart->update($id, $quantity);
                return redirect()->route('show_cart');
            }
            else{
                return redirect()->route('show_cart')->with('quasoluong','Số lượng không đủ để phục vụ quý khách!');
            }

        }
    }
    public function deleteAll(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }

}

?>