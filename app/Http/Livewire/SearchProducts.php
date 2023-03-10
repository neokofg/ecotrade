<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search;
    protected $queryString = ['search'];
    public function render()
    {
        $products = [];
        if($this->search){
            $result = Product::search($this->search)->get();
        }else{
            $result = 'nothing';
        }
        return view('livewire.search-products',compact('result'));
    }
}
