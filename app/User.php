<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements');
    }

    public function role()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function testResults()
    {
        return $this->hasMany(TestResults::class);
    }

    public function checkForAchievement($user)
    {
        $time_achvs = Achievement::where('type', Achievement::TYPE_TIME)->get();
        $tryes_achvs = Achievement::where('type', Achievement::TYPE_TRYES)->get();
        $user_results = $user->testResults;
        $user_achvs = $user->achievements()->pluck('achievement_id')->toArray();
        $user_tryes = count($user_results->toArray());
        $added_achvs = [];

        foreach ($time_achvs as $achv) {
            $user_has_achv = in_array($achv->id, $user_achvs);

            foreach ($user_results as $result) {
                if ($result->reaction_time <= $achv->term && !$user_has_achv) {
                    $user->achievements()->attach($achv);
                    $added_achvs[] = $achv;
                    break;
                }
            }
        }

        foreach ($tryes_achvs as $achv) {
            $user_has_achv = in_array($achv->id, $user_achvs);
            if ($user_tryes >= $achv->term && !$user_has_achv) {
                $user->achievements()->attach($achv);
                $added_achvs[] = $achv;
            }
        }

        if ($added_achvs) {
            return $added_achvs;
        } else {
            return false;
        }
    }
}
