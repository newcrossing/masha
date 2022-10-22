<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    //protected $guarded = [];
    protected $fillable = ['name', 'link', 'ico', 'active'];
}
