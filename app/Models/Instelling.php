<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instelling extends Model
{
    protected $table = 'instellingen';

    protected $primaryKey = 'sleutel';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $guarded = [];

    public static function get(string $sleutel, mixed $standaard = null): mixed
    {
        return static::find($sleutel)?->waarde ?? $standaard;
    }

    public static function set(string $sleutel, mixed $waarde): void
    {
        static::updateOrCreate(['sleutel' => $sleutel], ['waarde' => (string) $waarde]);
    }
}
