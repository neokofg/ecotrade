<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'products',
        'user_id',
        'total_price',
        'destination',
        'country',
        'city',
        'first_name',
        'last_name',
        'zip',
        'card_info'
    ];
    use HasFactory, HasUuids;
//    public function products()
//    {
////        $products = json_decode($products,true);
//        return $this->belongsToMany(Product::class, 'products');
//    }
    public function products($products,$productList)
    {
        $products = json_decode($products,true);
        $productsArray = array();
        $product = json_decode(json_encode($productList), true);
        for($i=0; $i<count($products); $i++) {
            $key = array_search($products[$i], array_column($product, 'id'));
            array_push($productsArray,$product[$key]['name']);
        }
        return $productsArray;
    }
}
