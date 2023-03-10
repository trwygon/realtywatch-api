<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'quantity',
        'title',
        'description',
        'cover_url',
        'total_area',
        'gross_area',
        'type',
        'typology',
        'rating',
        'current_price',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'quantity' => 'integer',
        'total_area' => 'decimal',
        'gross_area' => 'decimal',
        'rating' => 'integer',
        'current_price' => 'decimal',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function lists(): BelongsToMany
    {
        return $this->belongsToMany(PropertyList::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(PropertyMedia::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(PropertyAddress::class);
    }

    public function characteristics(): HasMany
    {
        return $this->hasMany(PropertyCharacteristic::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(PropertyOffer::class);
    }

    /* TODO: Is this needed? */
    public function priceHistories(): HasManyThrough
    {
        return $this->hasManyThrough(PropertyOfferPriceHistory::class, PropertyOffer::class);
    }
}
