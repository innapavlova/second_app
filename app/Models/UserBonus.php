<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBonus extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'user_bonuses';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:sO';
}
