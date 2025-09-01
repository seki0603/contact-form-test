<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name', 'first_name', 'gender',
        'email', 'tel', 'address', 'building', 'detail'
    ];

    // フルネーム表示のアクセサ
    public function getFullNameAttribute()
    {
        return $this->last_name . '  ' . $this->first_name;
    }

    // 性別表示のアクセサ
    public function getGenderLabelAttribute()
    {
        $map = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        return $map[$this->gender] ?? '';
    }
}
