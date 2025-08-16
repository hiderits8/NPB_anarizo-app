<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Team;
use App\Models\PlayerGameAppearance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roster extends Model
{

    use HasFactory;

    protected $primaryKey = 'roster_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'player_id',
        'team_id',
        'season_year',
        'start_date',
        'end_date',
        'uniform_number',
        'position',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function playerGameAppearances(): HasMany
    {
        return $this->hasMany(PlayerGameAppearance::class, 'appearance_id');
    }
}
