<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponses extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_survey',
        'answer',
    ];

    public function survey(){
        return $this->hasMany(Survey::class, 'id_survey');
    }
}
