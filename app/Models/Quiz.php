<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use PhpParser\Node\Stmt\Else_;

class Quiz extends Model
{
    protected $fillable = ["title", "description", "finished_at", "slug"];
    //protected $guarded = [];
    protected $dates = ["finished_at"];
    protected $appends = ["details"];
    use HasFactory;
    use Sluggable;


    public function getFinishedAtAttiribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function getDetailsAttribute() // veritabanında sutunu olmayan ama varmış gibi özellik ekleme
    {
        if ($this->results()->count()>0) {
            return [
                "average" => round($this->results()->avg("point")),
                "join_count" => $this->results()->count(),

            ];
        }
        else{
            return null;
        }
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class)->where("user_id", auth()->user()->id);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
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
