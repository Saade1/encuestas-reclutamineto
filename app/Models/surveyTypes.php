<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class surveyTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_form',
        'type',
        'question',
        'answer',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'id_form');
    }

}
