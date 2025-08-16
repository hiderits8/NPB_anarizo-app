<?php

namespace App\Models;

use App\Models\Roster;
use App\Models\Game;
use App\Models\Player;
use App\Models\SubstitutionEvent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerGameAppearance extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerGameAppearanceFactory> */
    use HasFactory;

    protected $primaryKey = 'appearance_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'game_id',
        'player_id',
        'start_inning',
        'end_inning',
        'position',
        'roster_id',
        'innings_played',
    ];

    public function roster(): BelongsTo
    {
        return $this->belongsTo(Roster::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function substitutionEvent(): HasOne
    {
        return $this->hasOne(SubstitutionEvent::class, 'event_id');
    }
}
