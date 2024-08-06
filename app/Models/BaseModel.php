<?php
namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model as Model;
use DateTimeInterface;

class BaseModel extends Model
{

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}