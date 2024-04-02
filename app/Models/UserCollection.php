<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCollection extends Model
{
    use HasFactory,SoftDeletes;

    protected $connection = 'cloud_authorization';

    protected $keyType = 'uuid';

    public $incrementing = false;
}
