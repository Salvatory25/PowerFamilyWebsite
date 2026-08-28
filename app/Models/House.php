<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'house_reference',
        'location_id',
        'price',
        'currency',
        'bedrooms',
        'bathrooms',
        'plot_size',
        'house_size',
        'listing_status',
        'ownership_title_type',
        'short_description',
        'description',
        'features',
        'featured_image',
        'is_featured',
        'is_published',
        'latitude',
        'longitude',
        'views_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($house) {
            if (empty($house->slug)) {
                $house->slug = Str::slug($house->title) . '-' . Str::random(5);
            }
            if (empty($house->house_reference)) {
                $house->house_reference = 'PFI-HOU-' . strtoupper(Str::random(6));
            }
        });
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(HouseImage::class)->orderBy('display_order', 'asc');
    }

    public function primaryImage()
    {
        return $this->hasOne(HouseImage::class)->where('is_primary', true);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'TSh ' . number_format($this->price, 0);
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->listing_status) {
            'available' => '<span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-emerald-500 text-white shadow-sm">Inapatikana</span>',
            'reserved' => '<span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-amber-500 text-white shadow-sm">Imeshikiliwa</span>',
            'sold' => '<span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-rose-500 text-white shadow-sm">Imeuzwa</span>',
            default => '<span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-gray-500 text-white">Binafsi</span>',
        };
    }

    public function getDisplayImageAttribute()
    {
        if ($this->featured_image) {
            if (str_starts_with($this->featured_image, 'http')) {
                return $this->featured_image;
            }
            return asset('storage/' . $this->featured_image);
        }
        $primary = $this->images->first();
        if ($primary) {
            if (str_starts_with($primary->image_path, 'http')) {
                return $primary->image_path;
            }
            return asset('storage/' . $primary->image_path);
        }
        return 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';
    }
}
