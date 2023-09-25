<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_form',
        'question', // Agrega 'question' al array $fillable
        // 'answer',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'id_form');
    }
}
