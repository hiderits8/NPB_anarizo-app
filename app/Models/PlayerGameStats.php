<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerGameStats extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerGameStatsFactory> */
    use HasFactory;

    protected $primaryKey = 'stats_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'player_id',
        'game_id',
        'AB',
        'R',
        'H',
        'doubles',
        'triples',
        'HR',
        'RBI',
        'SO',
        'BB',
        'HBP',
        'SacBunt',
        'SacFly',
        'SB',
        'E',
        'IP',
        'Pitches',
        'BF',
        'H_allowed',
        'HR_allowed',
        'K',
        'BB_given',
        'HBP_given',
        'R_allowed',
        'ER',
        'W',
        'L',
        'Holds',
        'SV',
        'outs_recorded',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
