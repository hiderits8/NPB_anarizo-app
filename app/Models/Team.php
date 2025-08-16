<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Roster;

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

    public function homeGames(): HasMany
    {
        return $this->hasMany(Game::class, 'home_team_id', 'team_id');
    }

    public function awayGames(): HasMany
    {
        return $this->hasMany(Game::class, 'away_team_id', 'team_id');
    }

    public function rosters(): HasMany
    {
        return $this->hasMany(Roster::class);
    }
}
