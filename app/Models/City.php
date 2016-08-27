<?php

namespace App\Models;

use Lfalmeida\Lbase\Models\BaseModel;

class City extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stateId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'state_id' => 'integer',
    ];

    /**
     * Get the state that owns the city.
     */
    
    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }

}
