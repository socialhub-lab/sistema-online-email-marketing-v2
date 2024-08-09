<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Lists
 * @package App\Models
 * @version February 14, 2022, 10:41 am -03
 *
 * @property \App\Models\Company $company
 * @property \Illuminate\Database\Eloquent\Collection $contactsLists
 * @property integer $company_id
 * @property string $name
 * @property string $description
 */
class Lists extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'lists';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'name',
        'description',
        'total_contacts',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'total_contacts' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'nullable',
        'name' => 'nullable|string|max:150',
        'description' => 'nullable|string|max:150',
        'total_contacts' => 'nullable',
        'user_id' => 'nullable',

        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campaigns()
    {
        return $this->hasMany(\App\Models\Campaigns::class, 'list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactsLists()
    {
        return $this->hasMany(\App\Models\ContactsLists::class, 'list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function contacts()
    {
        return $this->belongsToMany(\App\Models\Contacts::class, 'contacts_lists', 'list_id', 'contact_id')
            ->withPivot([
                'id',
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }
}
