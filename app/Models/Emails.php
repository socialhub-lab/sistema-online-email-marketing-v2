<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Emails
 * @package App\Models
 * @version December 20, 2021, 11:49 pm -03
 *
 * @property \App\Models\EmailsType $type
 * @property integer $emails_type_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $recent
 * @property string|\Carbon\Carbon $recent_time
 * @property integer $today
 */
class Emails extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'emails';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'emails_type_id',
        'username',
        'email',
        'password',
        'recent',
        'recent_time',
        'today',
        'available',
        'domain',
        'host',
        'port',
        'encryption'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'emails_type_id' => 'integer',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'recent' => 'integer',
        'recent_time' => 'datetime',
        'today' => 'integer',
        'available' => 'boolean',
        'domain' => 'string',
        'host' => 'string',
        'port' => 'string',
        'encryption' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'emails_type_id' => 'required',
        'username' => 'required|string|max:150',
        'email' => 'required|string|max:300',
        'password' => 'nullable|string|max:300',
        'recent' => 'required|integer',
        'recent_time' => 'nullable',
        'today' => 'required|integer',
        'available' => 'nullable|boolean',
        'domain' => 'required|string|max:150',
        'host' => 'nullable',
        'port' => 'nullable',
        'encryption' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\App\Models\EmailsTypes::class, 'emails_type_id');
    }
}
