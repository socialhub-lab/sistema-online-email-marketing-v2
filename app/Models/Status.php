<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Status
 * @package App\Models
 * @version December 20, 2021, 11:48 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $campaignsMessages
 * @property string $name
 * @property string $description
 * @property string $statusable_type
 * @property integer $statusable_id
 */
class Status extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'statuses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'statusable_type',
        'statusable_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'statusable_type' => 'string',
        'statusable_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:45',
        'description' => 'nullable|string|max:300',
        'statusable_type' => 'required|string|max:255',
        'statusable_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaignsMessages()
    {
        return $this->hasMany(\App\Models\CampaignsMessages::class, 'status_id');
    }
}
