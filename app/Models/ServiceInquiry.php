<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\EmailService;

class ServiceInquiry extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'reference',
        'service_type',
        'name',
        'email',
        'phone',
        'company',
        'message',
        'form_data',
        'locale',
        'status',
        'priority',
        'estimated_value',
        'responded_at',
        'assigned_to',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'form_data' => 'array',
        'responded_at' => 'datetime',
        'estimated_value' => 'decimal:2',
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

        return sprintf('SRV-%s-%03d', $year, $number);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function scopeByServiceType($query, $serviceType)
    {
        return $query->where('service_type', $serviceType);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function getServiceDisplayNameAttribute(): string
    {
        return match($this->service_type) {
            'business_consultancy' => 'Business Consultancy',
            'accounting' => 'Accounting Services',
            'tax_advisory' => 'Tax Advisory',
            'financial_planning' => 'Financial Planning',
            'business_registration' => 'Business Registration',
            'audit_compliance' => 'Audit & Compliance',
            'training' => 'Training & Capacity Building',
            'career_development' => 'Career Development',
            'feasibility_studies' => 'Feasibility Studies',
            'data_analytics' => 'Data Analytics',
            'market_research' => 'Market Research',
            default => ucfirst(str_replace('_', ' ', $this->service_type)),
        };
    }
}
