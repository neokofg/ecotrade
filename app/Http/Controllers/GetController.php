<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    protected function GetIndex(Request $request){
        $products = Cache::remember('index',15,function(){
            return Product::take(9)->get();
        });
        return view('index', compact(['products']));
    }
    protected function GetAdmin(){
        $types = DB::table('types')->get();
        $chars = DB::table('chars')->get();
        return view('admin', compact(['types','chars']));
    }
    protected function GetType($id){
        $type_id = $id;
        $products = Product::where('type_id',$id)->paginate(9);
        return view('type', compact(['products','type_id']));
    }
    protected function GetProduct($id,$product_id){
        //commentaries
        $comments = Comment::where('product_id',$product_id)->orderBy('created_at','DESC')->get();
        $commentStars = Comment::where('product_id',$product_id)->get('stars');
        $midAriphStar = 0;
        $a = 0;
        foreach($commentStars as $commentStar){
            $midAriphStar = $midAriphStar + intval($commentStar->stars);
            $a++;
        }
        if($midAriphStar == 0){
            $midAriphStar = 0;
        }else{
            $midAriphStar = $midAriphStar/$a;
        }
        //product
        $product = Product::where('id', $product_id)->first();
        $decodedChars = json_decode($product->chars, true);
        $images = $product->image;
        $images = json_decode($images,true);
        if(Auth::check()){
            $cartDecoded = json_decode(Auth::user()->cart,true);
            $favsDecoded = json_decode(Auth::user()->favorite,true);
            $cartIds = $cartDecoded['ids'];
            $favsIds = $favsDecoded['ids'];
            $i = 0;
            return view('product',compact(['product','cartIds','i','favsIds','decodedChars','comments','midAriphStar','images']));
        }
        return view('product',compact(['product','decodedChars','comments','midAriphStar','images']));
    }
    protected function GetCart(){
        $userCart = DB::table('users')->where('id', '=', Auth::user()->id)->get('cart');
        foreach($userCart as $cartEncodedItem){
            $cartDecoded = json_decode($cartEncodedItem->cart,true);
            $products = Product::whereIn('id',$cartDecoded['ids'])->orderBy('updated_at','DESC')->get();
        }
        return view('cart',compact(['products']));
    }
    protected function GetFavs(){
        $userFavs = DB::table('users')->where('id', '=', Auth::user()->id)->get('favorite');
        foreach($userFavs as $favsEncodedItem){
            $favsDecoded = json_decode($favsEncodedItem->favorite,true);
            $products = Product::whereIn('id',$favsDecoded['ids'])->orderBy('updated_at','DESC')->get();
        }
        return view('favs',compact(['products']));
    }
    protected function GetProfile(){
        $orders = Order::where('user_id', Auth::user()->id)->first();
        if($orders == null){
            $productList = null;
        }else{
            $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $ordersArray = $orders->toArray();
            $productIds = json_decode($ordersArray[0]['products'], true);
            $productList = Product::whereIn('id', $productIds)->select(array('id', 'name'))->get();
        }
        return view('profile',compact(['orders','productList']));
    }
    protected function GetSearch(Request $request){
        $find = $request->input('search');
        return view('search',compact(['find']));
    }
}
