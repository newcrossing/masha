<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Получение постов по тегу
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    } /**
     * Получение постов по тегу
     */
    public function docs()
    {
        return $this->morphedByMany(Doc::class, 'taggable');
    }
}
