<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations, HasTranslatableSlug;

    public $timestamps = false;

    protected $table = 'category';
    protected $fillable = [
        'name', 'slug'
    ];
    public array $translatable = [
        'name', 'description', 'slug'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

//    public function getRouteKeyName(): string
//    {
//        return 'slug';
//    }

    public function getIsActiveText(): string
    {
        return $this->is_active ? "Active" : "Not active";
    }
}
