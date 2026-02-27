<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\ValidationException;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'category', 'subcategory', 'country', 'city', 'zip', 'address', 'email', 'phone', 'website', 'isActive', 'isVerified', 'owner_id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(\App\Models\Service::class);
    }

    protected static function booted()
    {
        static::saving(function ($business) {
            $allowedSubcategories = array_keys(config('business_categories.'.$business->category.'.subcategories', []));
            if (! in_array($business->subcategory, $allowedSubcategories)) {
                throw ValidationException::withMessages([
                    'subcategory' => "Subcategory '{$business->subcategory}' is not valid for category '{$business->category}'.",
                ]);
            }
        });
    }
}
