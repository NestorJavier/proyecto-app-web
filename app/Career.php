<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Career extends Model
{
    protected $fillable = [
        'name', 'total_creditos'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
