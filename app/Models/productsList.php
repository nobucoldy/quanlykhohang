<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'supplier',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
