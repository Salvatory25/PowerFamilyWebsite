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
        return $this->currency . ' ' . number_format($this->price, 0);
    }

    public function getFormattedSizeAttribute(): string
    {
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
            $this->location?->region ?? 'Arusha'
        ]);

        return implode(', ', $parts);
    }

    public function getStatusBadgeClassesAttribute(): string
    {
        return match ($this->listing_status) {
            'available' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20',
            'reserved' => 'bg-amber-50 text-amber-700 ring-1 ring-amber-600/20',
            'sold' => 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20',
            default => 'bg-slate-50 text-slate-700 ring-1 ring-slate-600/20',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        $locale = app()->getLocale();
        if ($locale === 'sw') {
            return match ($this->listing_status) {
                'available' => 'Inapatikana',
                'reserved' => 'Imetengwa (Reserved)',
                'sold' => 'Imeuzwa',
                default => ucfirst($this->listing_status),
            };
        }

        return match ($this->listing_status) {
            'available' => 'Available',
            'reserved' => 'Reserved',
            'sold' => 'Sold',
            default => ucfirst($this->listing_status),
        };
    }

    public function getWhatsappInquiryUrlAttribute(): string
    {
        $whatsappNumber = Setting::get('whatsapp_number', '255742448965');
        // Strip non-digits
        $cleanedNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);

        $text = "Hello RELAND, I am interested in Plot [{$this->plot_reference}] - \"{$this->title}\" in {$this->full_location} priced at {$this->formatted_price}. Please share more details and arrange a site visit.";
        
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
                $model->plot_reference = 'REL-ARU-' . strtoupper(Str::random(5));
            }
        });
    }
}
