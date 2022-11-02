<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'text',
        'number',
        'image',
        'active',
    ];
}
