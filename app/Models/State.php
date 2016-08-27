<?php

namespace App\Models;

use Lfalmeida\Lbase\Models\BaseModel;

class State extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'uf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function cities() {
        return $this->hasMany(City::class);
    }

}
