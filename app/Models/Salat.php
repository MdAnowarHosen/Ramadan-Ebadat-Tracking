<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salat extends Model
{
    protected $fillable = ['name', 'faraj_rakat'];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'faraj_rakat' => 'integer',
        ];
    }
}
