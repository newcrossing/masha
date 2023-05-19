<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Social
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $ico
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social newQuery()
 * @method static \Illuminate\Database\Query\Builder|Social onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Social query()
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereIco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Social withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Social withoutTrashed()
 * @mixin \Eloquent
 */
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
