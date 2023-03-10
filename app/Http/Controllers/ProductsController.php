<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    protected function newType(Request $request){
        $validateFields = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'chars' => 'required'
        ]);
        DB::beginTransaction();
        $name = $request->input('name');
        $chars = $request->input('chars');
        $newChars = array();
        foreach($chars as $charItem){
            $newChars += [$charItem['name'] => 'none'];
        }
        $newChars = json_encode($newChars, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        $file= $request->file('image');
        $filename= date('YmdHi').$file->hashName();
        $file-> move(public_path('images'), $filename);
        $data = array('name' => $name,'image'=> $filename, "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'));
        DB::table('types')->insert($data);
        $getType = DB::table('types')->where('image','=', $filename)->get();
        foreach($getType as $getTypeItem){
            $data = array('type_id' => $getTypeItem->id,'chars'=> $newChars,"created_at" =>  date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s'));
            DB::table('chars')->insert($data);
        }
        DB::commit();
        return to_route('admin')->with('success', 'Успешно!');
    }
    protected function newProduct(Request $request){
        $validateFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'available' => 'required',
            'type' => 'required',
            'image' => 'required',
            'image.*' =>'mimes:jpeg,png,jpg,gif,svg'
        ]);
        DB::beginTransaction();
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $available = $request->input('available');
        $type = $request->input('type');
//        $file = $request->file('image');
//        $filename= date('YmdHi').$file->hashName();
//        $file-> move(public_path('images'), $filename);
        foreach($request->file('image') as $key => $image)
        {
            $fileName= date('YmdHi').$image->hashName();
            $image-> move(public_path('images'), $fileName);
            $insert[$key]['name'] = $fileName;
        }
        $chars = DB::table('chars')->where('type_id','=', $type)->get();
        foreach($chars as $char){
            $decodedChars = json_decode($char->chars,true);
            $newChars = array();
            foreach($decodedChars as $decodedChar => $value){
                ${$decodedChar} = $request->input("{$decodedChar}");
                $newChars += ["{$decodedChar}" => ${$decodedChar}];
            }
            $newChars = json_encode($newChars);
            print_r($newChars);
        }
        $product = Product::create([
            'name' => $name,
            'chars' => $newChars,
            'description' => $description,
            'price' => $price,
            'sale' => $price,
            'available' => $available,
            'type_id' => $type,
            'image'=> json_encode($insert)
        ]);
        DB::commit();
        return to_route('admin')->with('success', 'Успешно!');
    }

    //Следующие 4 функции -> Действия с корзиной и фаворитами

    protected function addToCart(Request $request){
        $validateFields = $request->validate([
            'id' => 'required'
        ]);
        $product_id = $request->input('id');
        $product_id = intval($product_id);
        $userCart = DB::table('users')->where('id','=',Auth::user()->id)->get('cart');
        foreach($userCart as $userCartItem){
            $decodedCart = json_decode($userCartItem->cart,true);
            if($decodedCart['ids'] == null){
                $cart = array(
                    'ids' => [$product_id],
                );
                $encodedCart = json_encode($cart);
            }else{
                array_push($decodedCart['ids'],$product_id);
                $encodedCart = json_encode($decodedCart);
            }
            $data = array(
                'cart' => $encodedCart
            );
            DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
             return back();
        }
    }
    protected function deleteFromCart($id){
        $id = intval($id);
        $userCart = DB::table('users')->where('id','=',Auth::user()->id)->get('cart');
        foreach($userCart as $userCartItem){
            $decodedCart = json_decode($userCartItem->cart,true);
            $decodedCart = $decodedCart['ids'];
            $pos = array_search($id, $decodedCart);
            if ($pos !== false) {
                unset($decodedCart[$pos]);
            }else{
                return back();
            }
            $cart = array(
                'ids' => $decodedCart
            );
            $data = array(
                'cart'=> json_encode($cart)
            );
            DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
            return back();
        }
    }
    protected function addToFavs(Request $request){
        $validateFields = $request->validate([
            'id' => 'required'
        ]);
        $product_id = $request->input('id');
        $product_id = intval($product_id);
        $userCart = DB::table('users')->where('id','=',Auth::user()->id)->get('favorite');
        foreach($userCart as $userCartItem){
            $decodedCart = json_decode($userCartItem->favorite,true);
            $decodedCart = implode('',$decodedCart['ids']);
            $decodedCart = intval($decodedCart);
            $cart = array(
                'ids' => [$decodedCart,$product_id]
            );
            $encodedCart = json_encode($cart);
            $data = array(
                'favorite' => $encodedCart
            );
            DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
            return back();
        }
    }
    protected function deleteFromFavs($id){
        $id = intval($id);
        $userCart = DB::table('users')->where('id','=',Auth::user()->id)->get('favorite');
        foreach($userCart as $userCartItem){
            $decodedCart = json_decode($userCartItem->favorite,true);
            $decodedCart = $decodedCart['ids'];
            $pos = array_search($id, $decodedCart);
            if ($pos !== false) {
                unset($decodedCart[$pos]);
            }else{
                return back();
            }
            $cart = array(
                'ids' => $decodedCart
            );
            $data = array(
                'favorite'=> json_encode($cart)
            );
            DB::table('users')->where('id', '=', Auth::user()->id)->update($data);
            return back();
        }
    }
    protected function newComment(Request $request){
        $validateFields = $request->validate([
            'comment' => 'required',
            'image' => 'required',
            'stars' => 'required|min:1|max:5',
            'product_id' => 'required'
        ]);
        $commentItem = Comment::where('product_id',$request->input('product_id'))->first();
        if($commentItem){
            if($commentItem->user_id == Auth::user()->id){
                return back()->withErrors(['Комментарий' => 'Вы уже опубликовали комментарий к данному продукту!']);
            }
        }
        $comment = $request->input('comment');
        $stars = $request->input('stars');
        $product_id = $request->input('product_id');
        $file = $request->file('image');
        $filename= date('YmdHi').$file->hashName();
        $file-> move(public_path('images'), $filename);
        $data = array(
            'comment' => $comment,
            'image' => $filename,
            'stars' => $stars,
            'product_id' => $product_id,
            'user_id' => Auth::user()->id,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        DB::table('comments')->insert($data);
        return back();
    }
}
