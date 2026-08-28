<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'district',
        'ward',
        'area_name',
        'slug',
        'featured_image',
        'description',
        'is_popular',
        'display_order',
    ];

    protected $casts = [
        'is_popular' => 'boolean',
        'display_order' => 'integer',
    ];

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }

    public function availablePlots(): HasMany
    {
        return $this->hasMany(Plot::class)->where('is_published', true)->where('listing_status', 'available');
    }

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }

    public function availableHouses(): HasMany
    {
        return $this->hasMany(House::class)->where('is_published', true)->where('listing_status', 'available');
    }

    public function getDisplayNameAttribute(): string
    {
        return "{$this->area_name}, {$this->district}";
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->featured_image) {
            if (str_starts_with($this->featured_image, 'http')) {
                return $this->featured_image;
            }
            return asset('storage/' . $this->featured_image);
        }
        return 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80';
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->area_name . '-' . $model->district);
            }
        });
    }
}
