<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Lists;
/**
 * Class Campaigns
 * @package App\Models
 * @version December 20, 2021, 11:49 pm -03
 *
 * @property \App\Models\Company $company
 * @property \App\Models\ContactsList $list
 * @property \App\Models\Template $template
 * @property \Illuminate\Database\Eloquent\Collection $campaignsMessages
 * @property integer $company_id
 * @property integer $list_id
 * @property integer $template_id
 * @property string|\Carbon\Carbon $start_date
 */
class Campaigns extends BaseModel
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'campaigns';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'list_id',
        'template_id',
        'status_id',
        'start_date',
        'title',
        'subject',
        'reply_to_email',
        'reply_to_name',
        'used_at',
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
        'list_id' => 'integer',
        'template_id' => 'integer',
        'status_id' => 'integer',
        'start_date' => 'datetime',
        'title' => 'string',
        'subject' => 'string',
        'reply_to_email' => 'string',
        'reply_to_name' => 'string',

        'used_at' => 'datetime',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'nullable',
        'list_id' => 'nullable',
        'template_id' => 'nullable',
        'status_id' => 'nullable',
        'start_date' => 'nullable',
        'title' => 'nullable',
        'subject' => 'nullable',
        'reply_to_email' => 'nullable',
        'reply_to_name' => 'nullable',
        'used_at' => 'nullable',
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
        return $this->belongsTo(\App\Models\Companies::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function list()
    {
        return $this->belongsTo(\App\Models\Lists::class, 'list_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function template()
    {
        return $this->belongsTo(\App\Models\Templates::class, 'template_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaignsMessages()
    {
        return $this->hasMany(\App\Models\CampaignsMessages::class, 'campaign_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaignsFiles()
    {
        return $this->hasMany(\App\Models\CampaignFiles::class, 'campaign_id');
    }

}
