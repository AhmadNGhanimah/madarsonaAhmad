<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public static function getSluggableAttribute()
    {
        return 'name';
    }

    public function supplierType()
    {
        return $this->belongsTo(SupplierType::class);
    }

    protected function LogoImage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => config('filesystems.disks.s3.url') . $value,
        );
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function links()
    {
        return $this->hasMany(SupplierLink::class);
    }

    public function gallery(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SupplierGallery::class);
    }
}
