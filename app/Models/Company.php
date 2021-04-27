<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $connection   =   'mysql2';
    protected $table = 'entity01';
    // protected $primaryKey = 'empno';
    public $incrementing = false;
    public $timestamps = false;
}
