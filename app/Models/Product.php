<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'category_name');
    }
    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public static function getDiscountPrice($product_id)
    {
        $proDetails = Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails), true);

        $catDetails = Category::select('category_discount')->where('id',$proDetails['category_id'])->first();
        json_decode(json_encode($catDetails), true);

        if ($proDetails['product_discount']>0) {
            $discountedPrice = $proDetails['product_price'] - ($proDetails['product_price'] * $proDetails['product_discount']/100) ;
        }else if ($catDetails['category_discount']>0) {
            $discountedPrice =  $proDetails['product_price'] - ($proDetails['product_price'] * $catDetails['category_discount']/100) ;
        }else {
            $discountedPrice = 0;
        }


        return $discountedPrice;
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public static function isProductNew($product_id)
    {
       $productIds = Product::select('id')->where('status', 1)->orderby('id','dESC')->limit(3)->pluck('id');
       
       $productIds = json_decode(json_encode($productIds), true);
       
       if (in_array($product_id,$productIds)) {
        $isProductNew = "Yes";
       }else {
        $isProductNew = "No";
       }
       return $isProductNew;
    }
}
