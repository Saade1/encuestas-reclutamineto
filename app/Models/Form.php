<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Importa la clase Str


class Form extends Model
{
    use HasFactory;
     protected $table = "form";
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

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'id_form');
    }
}
