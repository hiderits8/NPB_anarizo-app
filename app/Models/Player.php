<?php

namespace App\Models;

use App\Models\PlayerNameHistory;
use App\Models\PlayerGameAppearance;
use App\Models\PlayerGameStats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
    use HasFactory;

    protected $primaryKey = "player_id";
    public $incrementing = true;
    protected $keyType = "integer";

    public $timestamps = true;

    protected $fillable = [
        'official_name',
        'display_name',
        'english_name',
        'date_of_birth',
        'height',
        'weight',
        'throws_left',
        'throws_right',
        'bats_left',
        'bats_right',
    ];


    public function playerNameHistories(): HasMany
    {
        return $this->hasMany(PlayerNameHistory::class, 'player_id', 'player_id');
    }

    public function playerGameAppearances(): HasMany
    {
        return $this->hasMany(PlayerGameAppearance::class, 'player_id', 'player_id');
    }

    public function playerGameStats(): HasMany
    {
        return $this->hasMany(PlayerGameStats::class, 'player_id', 'player_id');
    }
}
