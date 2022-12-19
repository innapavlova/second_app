<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBonus extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'user_bonuses';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:sO';

    use SoftDeletes;
}
