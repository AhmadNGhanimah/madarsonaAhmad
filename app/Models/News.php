<?php

namespace App\Models;

use App\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public static function getSluggableAttribute()
    {
        return 'title';
    }

    protected function ImagePath(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Config::get('filesystems.disks.s3.url') . $value,
        );
    }


}
