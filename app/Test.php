<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['task', 'description','done'];
}
