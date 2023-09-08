<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = "surveys";

    // protected $fillable = [
    //     'question_type', 'survey_type', 'title', 'indications', 'created_at', 'updated_at',
    //     'effective_date'
    // ];
    protected $guarded =[];
}
