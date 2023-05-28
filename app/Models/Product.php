<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','attribute','sku','description','image','price','discount','cat_id','commission_id','child_cat_id'];

    public function categorie()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function commissions()
    {
        return $this->belongsTo(AccountSetting::class,'commission_id');
    }

    public static function getProductByCart($id)
    {
        return self::where('id',$id)->get()->toArray();
    }

    public function orders(){

        return $this->belongsToMany(Order::class,'order_items','product_id','order_id');

    }

    public function rel_pro()
    {
        return $this->hasMany('App\Models\Product','cat_id','cat_id');
    }

}

