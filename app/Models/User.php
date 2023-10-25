<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

//use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string $login
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $tel2
 * @property string|null $tel_alert
 * @property string|null $city
 * @property string|null $foto
 * @property string|null $vk вк
 * @property string|null $instagram Инстаграмм
 * @property int|null $notify_email
 * @property int|null $notify_tel
 * @property int|null $notify_sms
 * @property int|null $notify_tel2
 * @property int|null $notify_whatsup
 * @property int|null $notify_telegram
 * @property string|null $last_visit
 * @property string|null $active
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int|null $last_password оставить старый пароль
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $token
 * @property int|null $is_verified
 * @property-read \App\Models\Board|null $board
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifySms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifyTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifyTel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifyTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotifyWhatsup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelAlert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVk($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    //use  HasApiTokens;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'tel',
        'tel2',
        'tel_alert',
        'city',
        'vk',
        'telegram',
        'tiktok',
        'youtube',
        'odnoklassniki',
        'organization',
        'instagram',
        'birthday_at',
        'foto',
        'notify_email',
        'notify_tel',
        'notify_sms',
        'notify_whatsup',
        'notify_telegram',
        'active',
        'token',
        'is_verified',
    ];

    /**
     * Атрибуты, для которых НЕ разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $guarded = [
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFoto()
    {
        return ($this->foto) ?: '000.png';
    }

    /**
     * Генерирует login  для массового присвоения <br>
     * mr000000 - 6 цыфр
     * @return string
     */
    public function generateLogin()
    {
        return 'mr' . sprintf('%06d', $this->id);
    }

    /**
     * Связь с таблицей объявление
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function board()
    {
        return $this->hasOne(Board::class);
        //return $this->hasMany(Board::class);
    }


    /**
     * Проверка пользователя на статус администратора
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->is_admin === 1) {
            return true;
        } else {
            return false;
        }
    }
}
