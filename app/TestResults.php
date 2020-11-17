<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'reaction_time', 'date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
