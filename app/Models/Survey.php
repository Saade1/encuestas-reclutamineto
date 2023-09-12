<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Importa la clase Str

class Survey extends Model
{
    use HasFactory;

    protected $table = "surveys";
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($survey) {
            $survey->slug = Str::slug($survey->title, '-');
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
