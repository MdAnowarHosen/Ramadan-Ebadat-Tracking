<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Salat;
use App\Enums\EnumGender;
use App\Models\QuranTrack;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'age' => 'integer',
            'gender' => EnumGender::class,
            'is_admin' => 'boolean',
        ];
    }

    public function salats($date = null): BelongsToMany
    {
        // If no date is passed, use the current date
        $date = $date ?: Carbon::now()->format('Y-m-d');

        return $this->belongsToMany(Salat::class, 'salat_user')
            ->withPivot('sunnah_rakat')
            ->withTimestamps()
            ->wherePivot('created_at', $date);
    }

    public function get_salats(): BelongsToMany
    {
        return $this->belongsToMany(Salat::class, 'salat_user')
            ->withPivot('sunnah_rakat')
            ->withTimestamps();
    }

    public function quran_tracks(): HasMany
    {
        return $this->hasMany(QuranTrack::class);
    }

    public function tasks($date = null): BelongsToMany
    {
        // If no date is passed, use the current date
        $date = $date ?: Carbon::now()->format('Y-m-d');

        return $this->belongsToMany(Task::class, 'task_user')
            ->withTimestamps()
            ->wherePivot('created_at', $date);
    }

    public function get_tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_user')
            ->withTimestamps();
    }
}
