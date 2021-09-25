<?php

namespace Nidavellir\Cube\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nidavellir\Database\Factories\UserFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email_verified_at',
        'is_active',
        'is_subscribed',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

        'is_active' => 'boolean',
        'is_subscribed' => 'boolean',
    ];

    public function errors()
    {
        return $this->morphMany(Error::class, 'errorable');
    }

    public function apis()
    {
        return $this->hasMany(Api::class);
    }

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
