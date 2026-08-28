<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'plot_id',
        'house_id',
        'vehicle_id',
        'category',
        'name',
        'phone',
        'email',
        'preferred_contact_method',
        'message',
        'status',
        'admin_notes',
        'tracking_reference',
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'new' => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Mpya</span>',
            'contacted' => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800">Amewasiliana</span>',
            'follow-up' => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">Ufuatiliaji</span>',
            'site_visit_scheduled', 'converted' => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800">Imefanikiwa</span>',
            'closed' => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Imefungwa</span>',
            default => '<span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">N/A</span>',
        };
    }
}
