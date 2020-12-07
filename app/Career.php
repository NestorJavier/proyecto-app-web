<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subject;

class Career extends Model
{
    protected $fillable = [
        'name', 'total_creditos'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
