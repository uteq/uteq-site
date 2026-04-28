<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubprocessorChange extends Model
{
    /** @use HasFactory<\Database\Factories\SubprocessorChangeFactory> */
    use HasFactory;

    public const TYPE_INITIAL = 'initial';
    public const TYPE_ADDED = 'added';
    public const TYPE_UPDATED = 'updated';
    public const TYPE_REMOVED = 'removed';

    protected $fillable = [
        'subprocessor_id',
        'change_type',
        'summary',
        'details',
        'effective_from',
        'published_at',
        'broadcast_at',
    ];

    protected function casts(): array
    {
        return [
            'effective_from' => 'date',
            'published_at' => 'datetime',
            'broadcast_at' => 'datetime',
        ];
    }

    public function subprocessor(): BelongsTo
    {
        return $this->belongsTo(Subprocessor::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeRecent(Builder $query, int $months = 12): Builder
    {
        return $query->where('effective_from', '>=', now()->subMonths($months)->toDateString());
    }
}
