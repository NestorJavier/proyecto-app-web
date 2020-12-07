<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Career;

class Subject extends Model
{
    protected $fillable = [
        'career_id', 'name', 'creditos'
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
