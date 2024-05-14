<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'barcode','cost','price','stock','alerts','image','category_id', 'saledetail_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetails::class);
    }
    
    public function getImagenAttribute()
    {
        if(file_exists('storage/products/' . $this->image))
            return $this->image;
        else
            return 'camara1.png';
    }
}
