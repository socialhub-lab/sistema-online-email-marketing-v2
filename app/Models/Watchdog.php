<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchdog extends BaseModel
{
    use HasFactory;

    public $connection = "socialhub.api.watchdog";

    public $table = 'watchdog';

    public $fillable = [
        'origin',
        'success',
        'source',
        'user_id',
        'class',
        'function',
        'message'
    ];




    public function scopeCreatedByDate($query, $created_at, $op = '>=')
    {
       return $query->where('created_at', $op, $created_at);
    }


    public function scopeCreatedBetweeenDates($query, $begin, $end)
    {
       return $query->whereBetween('created_at', [$begin, $end]);
    }

}
