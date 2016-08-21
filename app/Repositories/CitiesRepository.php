<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/07/2016
 * Time: 15:41
 */

namespace App\Repositories;

use App\Models\City;
use Lfalmeida\Lbase\Repositories\Repository as BaseRepository;

class CitiesRepository extends BaseRepository
{
    /**
     * Define quais relações devem ser carregados ao instanciar um model
     *
     * @var array
     */
    protected $relationships = ['state'];

    /**
     * Define qual coluna deve ser usada na ordenação de resultados
     *
     * @var string
     */
    protected $defaultOrderColumn = 'name';

    /**
     * Retorna qual é o model que este repositório gerencia
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\City';
    }

    /**
     * Retorna uma lista de cidades com os dados do estado
     *
     * @param $stateId
     * @return mixed
     */

    public function listByStateId($stateId){
        return City::where('state_id', '=', $stateId)
            ->with('state')
            ->get();
    }
}