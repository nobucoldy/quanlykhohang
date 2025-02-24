<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Khai báo các trường có thể gán hàng loạt
    protected $fillable = [
        'name',
        'quantity',
        'import_date',
        'expiry_date',
        'supplier_id',
        'products_list_id',
    ];
    public function productsLists()
    {
        return $this->belongsTo(productsList::class);
    }

    // Quan hệ với nhà cung cấp (giả sử một sản phẩm chỉ có một nhà cung cấp)
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}