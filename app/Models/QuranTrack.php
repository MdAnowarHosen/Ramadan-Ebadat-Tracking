<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuranTrack extends Model
{

    protected $fillable = ['user_id', 'ayat', 'page', 'para', 'created_at'];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'ayat' => 'integer',
            'page' => 'float',
            'para' => 'float',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
