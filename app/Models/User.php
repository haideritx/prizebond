<?php

namespace App\Models;

use App\Models\UserPrizeBond;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Joselfonseca\LighthouseGraphQLPassport\HasSocialLogin;
use Joselfonseca\LighthouseGraphQLPassport\HasLoggedInTokens;
use Joselfonseca\LighthouseGraphQLPassport\MustVerifyEmailGraphQL;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,
        Notifiable,
//        HasSocialLogin,
        MustVerifyEmailGraphQL,
        HasLoggedInTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password',
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


    public function prizeBonds(): HasMany
    {
        return $this->hasMany(UserPrizeBond::class, 'user_id');
    }
}
