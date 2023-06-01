<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "category_id",
        "sub_category_id",
        "vendor_id",
        "brand_id",
        "short_description",
        "urdu_description",
        "english_description",
        "box_include",
        "slug",
        "product_type",
        "flash_sale",
        "price",
        "warranty_id",
        "pkg_weight",
        "length",
        "width",
        "height",
        "new_arrivals",
        "top_seller",
        "user_id",
        "image1",
        "image2",
        "image3",
        "image4",
        "image5",
        "s_price",
        "p_price",
        "qty",
        'varient_attr',
        'tags',
        'sku',
        'seller_sku'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }
    public function varients()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }

    public function compaignproduct()
    {
        return $this->hasMany(CompaignProduct::class);
    }

    public function tags()
    {
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
