<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * App\Models\Board
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $slug
 * @property string $name
 * @property string|null $text
 * @property int|null $money
 * @property string|null $city
 * @property string|null $date
 * @property bool|null $active
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foto[] $fotos
 * @property-read int|null $fotos_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Query\Builder|Board onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Board withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Board withoutTrashed()
 * @mixin \Eloquent
 */
class Board extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date_public'];

    /**
     * Связь  связь  с таблицей Users
     * Один к одному.
     * Получает пользователя
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     *Генерирует qr ссылку
     */
    public static function generateQr($id = '00000')
    {
        return 'qr-' . rand(1000, 9999) . $id. Str::lower(Str::random(5));
    }

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Связь с таблицей
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

}
