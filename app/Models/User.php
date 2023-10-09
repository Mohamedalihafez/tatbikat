<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Stephenjude\Wallet\Interfaces\Wallet;
use Stephenjude\Wallet\Traits\HasWallet;

class User extends Authenticatable implements Wallet, MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasWallet;


    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function setUsernameAttribute($username)
    {
        return $this->attributes["username"] = strtolower($username);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Ad::class, "wishlists")->withTimestamps();
    }

    public function favoriteHas($ad)
    {
        return self::favorites()->where("ad_id", $ad)->exists();
    }
}