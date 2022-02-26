<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Image_gallery;
use App\Models\Product;
use App\Models\Roadmap;
use App\Models\Subscriber;
use App\Models\Mission;
use App\Models\Vlog;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CHome extends Controller
{
    public function homepage()
    {
        $trending_shirts = Product::where('trending', 1)->where('prod_status', 1)->where('fk_cat_id', 1)->get();
        $trendings_caps = Product::where('trending', 1)->where('prod_status', 1)->where('fk_cat_id', 3)->get();
        $trendings_posters = Product::where('trending', 1)->where('prod_status', 1)->where('fk_cat_id', 2)->get();
        // $blogs = Blog::where('blog_status', 1)->get();
        // $vlogs = Vlog::where('vlog_status', 1)->get();
        $video_url = DB::table('video_url')->where('id', 1)->first();
        return view('home', [
            'trending_shirts' => $trending_shirts,
            // 'blogs' => $blogs,
            // 'vlogs' => $vlogs,
            'trendings_posters' => $trendings_posters,
            'trendings_caps' => $trendings_caps,
            'video' => $video_url
        ]);
    }
    public function blogs()
    {
        $blogs = Blog::where('blog_status', 1)->get();
        return view('blogs', [
            'blogs' => $blogs
        ]);
    }
    public function coming_soon_blogs()
    {
        return view('coming-soon-blogs');
    }
    public function coming_soon_vlogs()
    {
        return view('coming-soon-vlogs');
    }
    public function vlogs()
    {
        $vlogs = Vlog::where('vlog_status', 1)->get();

        return view('vlogs', [
            'vlogs' => $vlogs
        ]);
    }
    public function about()
    {
        $mission = Mission::where('id', 1)->first();
        $roadmap = Roadmap::all();
        return view('about', [
            'missions' => $mission,
            'roadmap' => $roadmap
        ]);
    }
    public function merch()
    {
        $shirts = Product::where('fk_cat_id', 1)->where('prod_status', 1)->get();
        $posters = Product::where('fk_cat_id', 2)->where('prod_status', 1)->get();
        $caps = Product::where('fk_cat_id', 3)->where('prod_status', 1)->get();
        return view('merch', [
            'shirts' => $shirts,
            'posters' => $posters,
            'caps' => $caps
        ]);
    }
    public function checkout()
    {
        $countries = DB::table('countries')->get();
        return view('checkout', [
            'countries' => $countries
        ]);
    }
    public function submit_checkout(Request $req)
    {
        $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
            'streetaddress' => ['required', 'string'],
            'paymethod' => ['same:cash|pallapay']
        ]);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $orderid = '';
        for ($i = 0; $i < 10; $i++) {
            $orderid .= $characters[rand(0, $charactersLength - 1)];
        }
        $phone = $req->phonecode . ' ' . $req->phone;
        $date = date("Y-m-d H:i:s");

        $result = DB::table('checkout')->insert([
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'phone' => $phone,
            'streetaddress' => $req->address,
            'zipcode' => $req->zipcode,
            'city' => $req->city,
            'country' => $req->country,
            'paymethod' => 'cash on delivery',
            'created_at' => $date
        ]);





        $cartitems = Cart::content();
        $total_amount = 0;
        foreach ($cartitems as $cartitem) {
            $total_price = $cartitem->qty * $cartitem->price;
            $total_amount += $total_price;
            $itemsinsert = DB::table('order_infos')->insert([
                'ord_id' => $orderid,
                'product_id' => $cartitem->id,
                'quantity' => $cartitem->qty,
                'total_price' => $total_price,
            ]);
        }
        $orderinsert = DB::table('orders')->insert([
            'order_id' => $orderid,
            'customer_email' =>  Auth::user()->email,
            'total_amount' => $total_amount,
            'date' => $date,
            'status' => 'pending'
        ]);
        return view('order_confirmation', [
            'data' => $req,
            'date' => $date
        ]);
        // if($req->paymethod=='cash'){
        //     return view('order_confirmation', [
        //         'data' => $req,
        //         'date' => $date
        //     ]);
        // }else{
        //     return view('payment',[
        //         'order_id'=>$orderid
        //     ]);
        // }



    }
    public function view_product(Request $req)
    {
        $product = Product::where('prod_id', $req->id)->first();
        $images = Image_gallery::where('product_id', $req->id)->get();
        $similars = Product::where('fk_cat_id', $product->fk_cat_id)->get();
        return view('view_product', [
            'product' => $product,
            'images' => $images,
            'similars' => $similars
        ]);
    }
    function add_new_subscriber(Request $req)
    {
        $result = Subscriber::insert([
            'sub_email' => $req->email,
            'sub_status' => 1
        ]);
        return $result;
    }
    function add_to_cart(Request $req)
    {
        $product = Product::where('prod_id', $req->id)->first();
        // Cart::add(['id'=>$req->id,'name'=>$product->prod_name,'price'=>$product->prod_price,'qty'=>$req->quantity,'options'=>['variant'=>$req->variant,'color'=>$req->color]]);
        Cart::add(['id' => $req->id, 'name' => $product->prod_name, 'qty' => $req->quantity, 'price' => $product->prod_price, 'weight' => 0, 'options' => ['variant' => $req->variant, 'color' => $req->color, 'image_url' => $product->prod_img_url]]);
        return $product;
    }
    function delete_cart()
    {
        Cart::destroy();
    }
}
