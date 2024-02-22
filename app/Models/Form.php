<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str; // Importa la clase Str


class Form extends Model
{
    use HasFactory;
    protected $table = "form";
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($form) {

            // Generar el slug a partir del título
            $form->slug = Str::slug($form->title, '-');

            // Establecer el valor de status en  al crear el formulario
            $form->status = 1;
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
