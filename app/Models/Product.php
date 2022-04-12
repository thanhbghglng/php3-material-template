<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillale=[
        'name',
        'description',
        'price',
        'image_url',
        'status',
        'category_id'

    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
