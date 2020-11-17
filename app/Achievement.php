<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    const TYPE_TIME = 0;
    const TYPE_TRYES = 1;

    public $timestamps = false;
    protected $fillable = ['title', 'description', 'term', 'type', 'medal'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievements');
    }
}
