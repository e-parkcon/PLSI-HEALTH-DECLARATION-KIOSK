<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    //

    protected $connection   =   'mysql2';
    protected $table = 'emp_master';
    protected $primaryKey = 'empno';
    public $incrementing = false;
    public $timestamps = false;
    
}
