<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
        return ($this->foto) ? $this->foto : '000.png';
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
