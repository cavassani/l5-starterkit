<?php
namespace Lfalmeida\Lbase\Models;

use Lfalmeida\Lbase\Traits\CamelCaseModelTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use CamelCaseModelTrait;

    /**
     * @var array
     */
    protected $hidden = ['pivot'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'displayName',
        'description',
    ];
}