<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'vehicle_reference',
        'make',
        'model',
        'year',
        'price',
        'currency',
        'transmission',
        'fuel_type',
        'mileage',
        'color',
        'body_type',
        'listing_status',
        'short_description',
        'description',
        'features',
        'featured_image',
        'is_featured',
        'is_published',
        'views_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            if (empty($vehicle->slug)) {
                $vehicle->slug = Str::slug($vehicle->title) . '-' . Str::random(5);
            }
            if (empty($vehicle->vehicle_reference)) {
                $vehicle->vehicle_reference = 'PFI-VEH-' . strtoupper(Str::random(6));
            }
        });
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class)->orderBy('display_order', 'asc');
    }

    public function primaryImage()
    {
        return $this->hasOne(VehicleImage::class)->where('is_primary', true);
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
        return 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=1200&q=80';
    }
}
