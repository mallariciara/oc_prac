<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = 'employee_tbl_';
    protected $primarykey = 'id';
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'age',
        'address',
        'zip',
    ];
}
