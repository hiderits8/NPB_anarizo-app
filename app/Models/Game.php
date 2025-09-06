<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Stadium;
use App\Models\GameCategory;
use App\Models\PlayerGameAppearance;
use App\Models\PlayByPlay;
use App\Models\PlayerGameStats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $primaryKey = 'game_id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    protected $fillable = [
        'season_year',
        'game_date',
        'stadium_id',
        'home_team_id',
        'away_team_id',
        'final_score_home',
        'final_score_away',
        'status',
        'is_nighter',
        'category_id',
    ];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id', 'team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id', 'team_id');
    }

    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class, 'stadium_id', 'stadium_id');
    }

    public function gameCategory(): BelongsTo
    {
        return $this->belongsTo(GameCategory::class, 'category_id', 'category_id');
    }

    public function playerGameAppearances(): HasMany
    {
        return $this->hasMany(PlayerGameAppearance::class, 'game_id', 'game_id');
    }

    public function playByPlays(): HasMany
    {
        return $this->hasMany(PlayByPlay::class, 'game_id', 'game_id');
    }

    public function playerGameStats(): HasMany
    {
        return $this->hasMany(PlayerGameStats::class, 'game_id', 'game_id');
    }
}
