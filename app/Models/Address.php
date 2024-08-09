<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Address
 * @package App\Models
 * @version July 25, 2022, 4:53 pm -03
 *
 */
class Address extends BaseModel
{
    use HasFactory;

    public $table = 'addresses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'zip_code',
        'street',
        'number',
        'complement',
        'neighbour',
        'city',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'zip_code' => 'string',
        'street' => 'string',
        'number' => 'string',
        'complement' => 'string',
        'neighbour' => 'string',
        'city' => 'string',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',

        'zip_code' => 'nullable',
        'street' => 'nullable',
        'number' => 'nullable',
        'complement' => 'nullable',
        'neighbour' => 'nullable',
        'city' => 'nullable',
        'state' => 'nullable',

        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Companies::class, 'company_id');
    }

}
