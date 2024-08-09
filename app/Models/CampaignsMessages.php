<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CampaignsMessages
 * @package App\Models
 * @version December 20, 2021, 11:49 pm -03
 *
 * @property \App\Models\Campaign $campaign
 * @property \App\Models\Contact $contact
 * @property \App\Models\Status $status
 * @property integer $campaign_id
 * @property integer $contact_id
 * @property integer $status_id
 */
class CampaignsMessages extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'campaigns_messages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'campaign_id',
        'contact_id',
        'status_id',
        'hash_code',
        'readed',
        'subject_customized'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campaign_id' => 'integer',
        'contact_id' => 'integer',
        'status_id' => 'integer',
        'hash_code' => 'string',
        'readed' => 'integer',
        'subject_customized' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campaign_id' => 'nullable',
        'contact_id' => 'required',
        'status_id' => 'required',
        'hash_code' => 'required',
        'readed' => 'required',
        'subject_customized' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaigns::class, 'campaign_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contact()
    {
        return $this->belongsTo(\App\Models\Contacts::class, 'contact_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->morphOne(\App\Models\Status::class, 'statusable', 'statusable_type', 'statusable_id', 'status_id');

    }
}
