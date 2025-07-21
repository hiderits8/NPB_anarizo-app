<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;

    protected $primaryKey = 'team_id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    protected $fillable = [
        'team_name',
        'league',
    ];



    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function rosteres(): HasMany
    {
        return $this->hasMany(Roster::class);
    }
}
