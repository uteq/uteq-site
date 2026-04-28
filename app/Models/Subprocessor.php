<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subprocessor extends Model
{
    /** @use HasFactory<\Database\Factories\SubprocessorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'service',
        'data_location',
        'transfer_basis',
        'model_training',
        'country_code',
        'notes',
        'sort_order',
        'active',
        'effective_from',
        'effective_until',
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'effective_from' => 'date',
            'effective_until' => 'date',
            'sort_order' => 'integer',
        ];
    }

    public function changes(): HasMany
    {
        return $this->hasMany(SubprocessorChange::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
