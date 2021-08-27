<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;

    protected $fillable = [
       'f_name',
       'l_name',
       'email',
       'pass',
       'date',
       'c_code',
       'number',
       'gender',
       'file',
       'address'
    ];
}
