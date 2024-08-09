<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmailsTypes
 * @package App\Models
 * @version December 20, 2021, 11:48 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection $emails
 * @property string $name
 * @property string $decription
 * @property string $translation
 */
class EmailsTypes extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'emails_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'decription',
        'translation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'decription' => 'string',
        'translation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:15',
        'decription' => 'nullable|string|max:300',
        'translation' => 'nullable|string|max:300',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function emails()
    {
        return $this->hasMany(\App\Models\Emails::class, 'emails_type_id');
    }
}
