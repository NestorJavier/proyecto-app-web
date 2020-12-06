<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Evento extends Model
{
    protected $fillable = [
        'title', 'description', 'start', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
