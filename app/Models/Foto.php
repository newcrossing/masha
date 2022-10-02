<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
