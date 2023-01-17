<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations, HasTranslatableSlug;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'slug',
        'price',
        'status'
    ];

    public array $translatable = [
        'name', 'description', 'slug'
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(Files::class, 'object_id', 'id');
    }

    public function getFirstFile()
    {
        return $this->files()->first();
    }
}
