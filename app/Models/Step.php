<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Step
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $text
 * @property int|null $number
 * @property string|null $image
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Step newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Step newQuery()
 * @method static \Illuminate\Database\Query\Builder|Step onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Step query()
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Step whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Step withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Step withoutTrashed()
 * @mixin \Eloquent
 */
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
