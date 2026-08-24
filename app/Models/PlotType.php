<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PlotType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_sw',
        'slug',
        'description',
        'icon',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }

    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        return ($locale === 'sw' && !empty($this->name_sw)) ? $this->name_sw : $this->name_en;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name_en);
            }
        });
    }
}
