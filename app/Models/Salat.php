<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'salat_user')
            ->withPivot('sunnah_rakat')
            ->withTimestamps();
    }
}
