<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;

class OrdersController extends Controller
{
    protected function pageOrder(Request $request){
        $product = Product::whereIn('id',$request->input('product'))->get();
        return view('makeOrder',compact(['product']));
    }
    protected function newOrder(Request $request){
        $validateFields = $request->validate([
            'total_price' => 'required',
            'destination' => 'required',
            'products' => 'required',
            'card' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);
        $total_price = $request->input('total_price');
        $destination = $request->input('destination');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $country = $request->input('country');
        $city = $request->input('city');
        $zip = $request->input('zip');
        $card = $request->input('card');
        $card = json_encode($card);
        $products = $request->input('products');
        $productIds = array();
        $user_id = Auth::user()->id;
        $decodedCart = json_decode(Auth::user()->cart,true);
        $decodedCart = $decodedCart['ids'];
        $products = json_decode($products[0]);
        foreach($products as $productItem){
            array_push($productIds,$productItem->id);
        }
        foreach($products as $productItem){
            $pos = array_search(intval($productItem->id), $decodedCart);
            if ($pos !== false) {
                unset($decodedCart[$pos]);
            }
        }
        $cart = array(
            'ids' => $decodedCart
        );
        User::where('id', $user_id)->update([
            'cart'=> json_encode($cart)
        ]);
        Order::create([
            'products' => json_encode($productIds),
            'user_id' => $user_id,
            'total_price' => $total_price,
            'destination' => $destination,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'country' => $country,
            'city' => $city,
            'zip' => $zip,
            'card_info' => $card,
            ]);
        return to_route('profile');
    }
}
