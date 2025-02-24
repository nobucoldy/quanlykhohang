<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\productsList;

class ListController extends Controller
{
    public function showList(){
        $products =productsList::all();

        // Truyền biến $products vào view
        return view('products.list', compact('products'));

    }
}
