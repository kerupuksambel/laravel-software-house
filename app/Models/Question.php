<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'question_title',
        'question_description',
        'user_id'
    ];
}
