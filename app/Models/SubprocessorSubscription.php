<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubprocessorSubscription extends Model
{
    /** @use HasFactory<\Database\Factories\SubprocessorSubscriptionFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'confirmation_token',
        'unsubscribe_token',
        'confirmed_at',
        'unsubscribed_at',
        'ip_address',
    ];

    protected $hidden = [
        'confirmation_token',
        'unsubscribe_token',
    ];

    protected function casts(): array
    {
        return [
            'confirmed_at' => 'datetime',
            'unsubscribed_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $sub) {
            $sub->confirmation_token ??= Str::random(48);
            $sub->unsubscribe_token ??= Str::random(48);
        });
    }

    public function isActive(): bool
    {
        return $this->confirmed_at !== null && $this->unsubscribed_at === null;
    }

    public function confirm(): void
    {
        $this->forceFill([
            'confirmed_at' => now(),
            'unsubscribed_at' => null,
        ])->save();
    }

    public function unsubscribe(): void
    {
        $this->forceFill(['unsubscribed_at' => now()])->save();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereNotNull('confirmed_at')->whereNull('unsubscribed_at');
    }
}
