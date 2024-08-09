<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FieldsContactsLists
 * @package App\Models
 * @version July 19, 2022, 10:25 pm -03
 *
 */
class FieldsContactsLists extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'fields_contacts_lists';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'contacts_lists_id',
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contacts_lists_id' => 'integer',
        'key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contacts_lists_id' => 'required',
        'key' => 'nullable',
        'value' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contacts_lists()
    {
        return $this->belongsTo(\App\Models\ContactsLists::class, 'contacts_lists_id');
    }

}
