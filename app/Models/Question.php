<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table="questions";
    protected $fillable = ["quiz_id","question","image","answer1", "answer2", "answer3", "answer4","correct_answer"];
    use HasFactory;

}
