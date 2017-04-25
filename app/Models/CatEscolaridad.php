<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CatEscolaridad
 * @package App\Models
 * @version April 25, 2017, 9:38 pm UTC
 */
class CatEscolaridad extends Model
{
    use SoftDeletes;

    public $table = 'cat_escolaridads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'escolaridad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'escolaridad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'escolaridad' => 'required'
    ];

    
}
