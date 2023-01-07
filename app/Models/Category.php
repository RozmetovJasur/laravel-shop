<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $table = 'category';
    protected $fillable = [
        'name'
    ];
    public array $translatable = [
        'name', 'description'
    ];
}
