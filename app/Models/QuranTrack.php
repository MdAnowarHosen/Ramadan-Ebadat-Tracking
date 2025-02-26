<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuranTrack extends Model
{
    protected $fillable = ['user_id', 'ayat', 'page', 'para'];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'ayat' => 'integer',
            'page' => 'float',
            'para' => 'float',
        ];
    }
}
