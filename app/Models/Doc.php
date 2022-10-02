<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function setDateNull($date1 = '')
    {
        if (empty($date1)) {
            return null;
        } else {
            return \Carbon\Carbon::createFromFormat('d/m/Y', $date1)->format('Y-m-d');
        }
    }

    /**
     * Возвращает краткое название документа
     * @return string
     */
    public function getNameDoc()
    {
        $name = '';
        $name .= $this->preamble_name ?? '';
        if (!empty($this->date_sign)) {
            Carbon::setLocale('ru');
            $Carbone = Carbon::now()->locale('ru_RU');
            $name .= ' от ' . $Carbone->createFromFormat('Y-m-d', $this->date_sign)->isoFormat('D MMMM YYYY',
                    'Do MMMM') . ' г.';
        }
        $name .= $this->short_name ? ' &laquo;' . $this->short_name . '&raquo;' : '';
        return $name;
    }

    public function getShotName()
    {
        if (empty($this->preamble_name)) {
            return $this->name;
        }
        $name = $this->preamble_name;
        $name .= (!empty($this->nomer)) ? ' №' . $this->nomer : '';
        $name .= (!empty($this->date_pod)) ? ' от ' . $this->date_pod->translatedFormat('j F Y') . ' г.' : '';

        return $name;
    }


    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'date_pod',
        'date_pub',
        'date_vst',
        'date_end_vst',
        'date_npub',
        'date_kpub'
    ];

    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    /**
     * Полиморфная  связь  с таблицей Tags
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
