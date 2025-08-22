<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInquiry extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'company',
        'service',
        'message',
        'locale',
        'status',
        'priority',
        'responded_at',
        'assigned_to',
        'metadata',
        'ip_address',
        'user_agent',
        'notes',
    ];

    protected $casts = [
        'metadata' => 'array',
        'responded_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($inquiry) {
            if (empty($inquiry->reference)) {
                $inquiry->reference = static::generateReference();
            }
        });
    }

    public static function generateReference(): string
    {
        $year = date('Y');
        $lastInquiry = static::whereYear('created_at', $year)
            ->orderBy('created_at', 'desc')
            ->first();

        $number = $lastInquiry ?
            (int) substr($lastInquiry->reference, -3) + 1 : 1;

        return sprintf('INQ-%s-%03d', $year, $number);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByService($query, $service)
    {
        return $query->where('service', $service);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
