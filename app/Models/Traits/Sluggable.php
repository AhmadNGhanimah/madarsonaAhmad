<?php

namespace App\Models\Traits;

trait Sluggable
{
    protected static function bootSluggable()
    {
        static::creating(function ($model) {
            $model->slug_en = static::generateUniqueSlug($model->{static::getSluggableAttribute() . '_en'}, 'en');
            $model->slug_ar = static::generateUniqueSlug($model->{static::getSluggableAttribute() . '_ar'}, 'ar');
        });

       /* static::updating(function ($model) {
            $model->slug_en = static::generateUniqueSlug($model->{static::getSluggableAttribute() . '_en'}, 'en');
            $model->slug_ar = static::generateUniqueSlug($model->{static::getSluggableAttribute() . '_ar'}, 'ar');
        });*/
    }

    private static function generateUniqueSlug($title, $locale)
    {
        $slug = generate_slug_from_string($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where("slug_$locale", $slug)->exists() && $count <= 5) {
            $slug = "$originalSlug-$count";
            $count++;
        }

        if (static::where("slug_$locale", $slug)->exists()) {
            // Handle the case where a unique slug could not be generated in 5 tries
            throw new \Exception("Unable to generate unique slug for the $title");
        }

        return $slug;
    }
}
