<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'plot_reference',
        'plot_type_id',
        'location_id',
        'street_address',
        'listing_status',
        'price',
        'currency',
        'price_negotiable',
        'plot_size',
        'size_unit',
        'dimension_details',
        'ownership_title_type',
        'short_description',
        'description',
        'nearby_landmarks',
        'road_accessibility',
        'has_electricity',
        'has_water',
        'has_internet',
        'has_fence',
        'topography',
        'latitude',
        'longitude',
        'google_maps_embed_url',
        'featured_image',
        'is_featured',
        'is_published',
        'views_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'plot_size' => 'decimal:2',
        'price_negotiable' => 'boolean',
        'has_electricity' => 'boolean',
        'has_water' => 'boolean',
        'has_internet' => 'boolean',
        'has_fence' => 'boolean',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'views_count' => 'integer',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function plotType(): BelongsTo
    {
        return $this->belongsTo(PlotType::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PlotImage::class)->orderBy('display_order');
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('listing_status', 'available');
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'TSh ' . number_format($this->price, 0);
    }

    public function getFormattedSizeAttribute(): string
    {
        if ($this->dimension_details) {
            return $this->dimension_details;
        }
        $val = rtrim(rtrim(number_format($this->plot_size, 2), '0'), '.');
        return "{$val} {$this->size_unit}";
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if (!empty($this->featured_image)) {
            if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
                return $this->featured_image;
            }
            return asset('storage/' . $this->featured_image);
        }

        $firstImage = $this->images()->first();
        if ($firstImage) {
            return $firstImage->url;
        }

        return 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80';
    }

    public function getFullLocationAttribute(): string
    {
        $parts = array_filter([
            $this->street_address,
            $this->location?->area_name,
            $this->location?->district,
            $this->location?->region ?? 'Tanzania'
        ]);

        return implode(', ', $parts);
    }

    public function getStatusBadgeClassesAttribute(): string
    {
        return match ($this->listing_status) {
            'available' => 'bg-emerald-500 text-white',
            'reserved' => 'bg-amber-500 text-white',
            'sold' => 'bg-rose-500 text-white',
            default => 'bg-slate-500 text-white',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        $locale = app()->getLocale();
        if ($locale === 'en') {
            return match ($this->listing_status) {
                'available' => 'Available',
                'reserved' => 'Reserved',
                'sold' => 'Sold',
                default => ucfirst($this->listing_status),
            };
        }

        return match ($this->listing_status) {
            'available' => 'Inapatikana',
            'reserved' => 'Imeshikiliwa',
            'sold' => 'Imeuzwa',
            default => ucfirst($this->listing_status),
        };
    }

    public function getWhatsappInquiryUrlAttribute(): string
    {
        $whatsappNumber = Setting::get('whatsapp_number', '255700000000');
        $cleanedNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $locale = app()->getLocale();
        if ($locale === 'en') {
            $text = "Hello Power Family Investment, I am interested in Plot [{$this->plot_reference}] - \"{$this->title}\" located in {$this->full_location} priced at {$this->formatted_price}. Please provide more details.";
        } else {
            $text = "Habari Power Family Investment, nimevutiwa na Kiwanja [{$this->plot_reference}] - \"{$this->title}\" kilichopo {$this->full_location} chenye bei ya {$this->formatted_price}. Naomba maelezo zaidi.";
        }
        
        return "https://wa.me/{$cleanedNumber}?text=" . rawurlencode($text);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title . '-' . Str::random(5));
            }
            if (empty($model->plot_reference)) {
                $model->plot_reference = 'PFI-PLT-' . strtoupper(Str::random(5));
            }
        });
    }
}
