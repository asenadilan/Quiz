<?php

namespace App\Models;

use Answers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table="questions";
    protected $fillable = ["quiz_id","question","image","answer1", "answer2", "answer3", "answer4","correct_answer"];
    use HasFactory;

    public function my_answer(){
        return $this->hasOne(Answer::class)->where("user_id",auth()->user()->id);
    }
}
