<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyResponses;


class UserResponse extends Model
{
    use HasFactory;

    protected $table = 'users_responses'; // Nombre de la tabla correcto

    protected $fillable = [
        'user_id',
        'form_id',
        'survey_id',
        'user_name', // Agregar el campo user_name
        'answer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function surveyResponses()
    {
        return $this->hasMany(SurveyResponses::class, 'user_response_id');
    }
}
