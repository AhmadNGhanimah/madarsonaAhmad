<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class SupplierGallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function Path(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Config::get('filesystems.disks.s3.url') . $value,
        );
    }
}
