<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = ['name', 'status'];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'status' => 'boolean',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_users')
            ->withTimestamps();
    }
}
