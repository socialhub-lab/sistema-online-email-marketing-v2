<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contacts
 * @package App\Models
 * @version December 20, 2021, 11:49 pm -03
 *
 * @property \App\Models\Company $company
 * @property \App\Models\ContactsList $list
 * @property \Illuminate\Database\Eloquent\Collection $campaignsMessages
 * @property integer $company_id
 * @property integer $list_id
 * @property string $name
 * @property string $email
 */
class Contacts extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'contacts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'name',
        'email'
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
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'nullable',
        'name' => 'nullable|string|max:300',
        'email' => 'nullable|string|max:100',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaignsMessages()
    {
        return $this->hasMany(\App\Models\CampaignsMessages::class, 'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contactsLists()
    {
        return $this->hasOne(\App\Models\ContactsLists::class, 'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function lists()
    {
        return $this->belongsToMany(\App\Models\Lists::class, 'contacts_lists', 'contact_id', 'list_id')
            ->withPivot([
                'id',
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function blacklist()
    {
        // return $this->belongsToMany(\App\Models\Blacklist::class, 'contact_id');
        return $this->hasOne(\App\Models\Blacklist::class, 'contact_id');
    }
}
