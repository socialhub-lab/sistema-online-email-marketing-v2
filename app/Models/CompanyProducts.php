<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CompanyProducts
 * @package App\Models
 * @version December 20, 2021, 11:49 pm -03
 *
 * @property \App\Models\Company $company
 * @property \Illuminate\Database\Eloquent\Collection $campaigns
 * @property \Illuminate\Database\Eloquent\Collection $contacts
 * @property integer $company_id
 * @property string $name
 * @property string $description
 */
class CompanyProducts extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'company_products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'module_id',
        'quantity',
        'used'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'module_id' => 'integer',
        'quantity' => 'integer',
        'used' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',
        'module_id' => 'nullable',
        'quantity' => 'required',
        'used' => 'required',

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
