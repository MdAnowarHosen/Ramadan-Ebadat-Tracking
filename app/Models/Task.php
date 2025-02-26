<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    protected $fillable = ['name', 'status'];
    // protected $appends = ['owned'];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'status' => 'boolean',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_user')
            ->withTimestamps();
    }

    // public function getOwnedAttribute()
    // {
    //     return Auth::check() ? $this->users()->where('user_id', Auth::id())->where('created_at', $date)->exists() : false;
    // }

}
