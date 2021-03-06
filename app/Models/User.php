<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Lfalmeida\Lbase\Models\BaseModel;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, EntrustUserTrait, CanResetPassword;

    /**
     * Regras de validação deste model
     *
     * @see https://github.com/jarektkaczyk/eloquence
     * @var array
     */
    protected static $businessRules = [
        'name' => ['required', 'min:5'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:6']
    ];
    protected $searchableColumns = ['name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profilePicture',
        'profilePictureMeta',
        'cityId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('Lfalmeida\Lbase\Models\Role');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profilePicture()
    {
        return $this->hasOne('Lfalmeida\Lbase\Models\Document', 'file_path', 'profile_picture');
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

}
