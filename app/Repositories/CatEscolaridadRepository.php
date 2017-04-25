<?php

namespace App\Repositories;

use App\Models\CatEscolaridad;
use InfyOm\Generator\Common\BaseRepository;

class CatEscolaridadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'escolaridad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CatEscolaridad::class;
    }
}
