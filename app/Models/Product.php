<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'name',
        'type_id',
        'image',
        'description',
        'price',
        'sale',
        'available',
        'chars'
    ];
    public function getImage($image){
        $decoded = json_decode($image,true);
        return $decoded[0]['name'];
    }
    public function searchableAs()
    {
        return 'products_index';
    }

}
