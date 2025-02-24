<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function showSupplier(){
        $products = Supplier::all();

        // Truyền biến $products vào view
        return view('products.supplier', compact('products'));
    }
}
