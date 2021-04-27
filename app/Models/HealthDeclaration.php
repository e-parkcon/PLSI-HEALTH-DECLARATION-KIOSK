<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthDeclaration extends Model
{
    //
    protected $connection   =   'mysql';
    protected $table = 'health_checklist';
    protected $primaryKey = 'empno';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'empno', 'health_declaration', 'txndate', 'txntime'
    ];
}
