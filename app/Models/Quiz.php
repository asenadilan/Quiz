<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    protected $fillable= ["title","description","finished_at","slug"];
    //protected $guarded = [];
    protected $dates= ["finished_at"];
    use HasFactory;
    use Sluggable;


    public function getFinishedAtAttiribute($date){
        return $date ? Carbon::parse($date):null;
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
