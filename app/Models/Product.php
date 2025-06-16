<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'short_description',
        'regular_price',
        'sale_price',
        'sale_start',
        'sale_end',
        'stock_quantity',
        'low_stock_threshold',
        'stock_status',
        'manage_stock',
        'weight',
        'length',
        'width',
        'height',
        'shipping_class',
        'has_variants',
        'status',
        'visibility',
        'password',
        'publish_date',
        'video_url'
    ];

    protected $casts = [
        'sale_start' => 'date',
        'sale_end' => 'date',
        'publish_date' => 'datetime',
        'manage_stock' => 'boolean',
        'has_variants' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function featuredImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_featured', true);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeVisible($query)
    {
        return $query->where('visibility', 'public');
    }

    public function getCurrentPriceAttribute()
    {
        if ($this->sale_price && $this->isOnSale()) {
            return $this->sale_price;
        }
        return $this->regular_price;
    }

    public function isOnSale()
    {
        if (!$this->sale_price) {
            return false;
        }

        if ($this->sale_start && $this->sale_start->isFuture()) {
            return false;
        }

        if ($this->sale_end && $this->sale_end->isPast()) {
            return false;
        }

        return true;
    }

    public function inStock()
    {
        if (!$this->manage_stock) {
            return true;
        }

        return $this->stock_quantity > 0;
    }

    public function lowStock()
    {
        if (!$this->manage_stock || !$this->low_stock_threshold) {
            return false;
        }

        return $this->stock_quantity <= $this->low_stock_threshold;
    }
}