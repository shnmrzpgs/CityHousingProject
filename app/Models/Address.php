<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Shelter\ShelterApplicant;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_id',
        'purok_id',
        'full_address',
    ];

    protected $casts = [
        'id' => 'integer',
        'barangay_id' => 'integer',
        'purok_id' => 'integer',
        'full_address' => 'string',
    ];

    public function barangay(): BelongsTo
    {
        return $this->belongsTo(Barangay::class, 'barangay_id', 'id');
    }
    public function purok(): BelongsTo
    {
        return $this->belongsTo(Purok::class);
    }
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'address_id'); // `address_id` should be in the `applicants` table
    }
    public function shelterApplicants(): HasMany
    {
        return $this->hasMany(ShelterApplicant::class, 'address_id');
    }
    public function taggedAndValidatedApplicants(): HasMany
    {
        return $this->hasMany(TaggedAndValidatedApplicant::class);
    }
    public function awardees(): HasMany
    {
        return $this->hasMany(Awardee::class);
    }
}
