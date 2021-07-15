<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Quiz extends Model
{
    //protected $fillable= ["title","description","finished_at"];
    protected $guarded = [];
    protected $dates= ["finished_at"];
    use HasFactory;
    public function getFinishedAtAttiribute($date){
        return $date ? Carbon::parse($date):null;
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
