<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $result
 * @property string|null $url
 * @property string|null $method
 * @property string|null $ip
 * @property string|null $agent
 * @property int|null $user_id
 * @property string|null $user_login
 * @property string|null $parametrs
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Query\Builder|Activity onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereParametrs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserLogin($value)
 * @method static \Illuminate\Database\Query\Builder|Activity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Activity withoutTrashed()
 * @mixin \Eloquent
 */
class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'result',
        'info',
        'parametrs',
        'user_login',
        'user_id'
    ];


}
