<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Foto
 *
 * @property int $id
 * @property int $board_id
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Board|null $board
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newQuery()
 * @method static \Illuminate\Database\Query\Builder|Foto onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Foto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Foto withoutTrashed()
 * @mixin \Eloquent
 */
class Foto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'file',
    ];


    /**
     * Связь  связь  с таблицей Board
     * Многое к одному.
     * Получает пользователя
     *
     * @return BelongsTo
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
