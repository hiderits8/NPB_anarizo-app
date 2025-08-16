<?php

namespace App\Models;

use App\Models\Game;
use App\Models\PitchEvent;
use App\Models\StealEvent;
use App\Models\SubstitutionEvent;
use App\Models\AdvancementEvent;
use App\Models\ErrorEvent;
use App\Models\OtherEvent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayByPlay extends Model
{
    /** @use HasFactory<\Database\Factories\PlayByPlayFactory> */
    use HasFactory;

    protected $primaryKey = 'pbp_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'game_id',
        'inning',
        'top_bottom',
        'pbp_sequence',
        'anchor_pitch_sequence',
        'count_b',
        'count_s',
        'count_o',
        'batter_id',
        'pitcher_id',
        'runner_first_id',
        'runner_second_id',
        'runner_third_id',
        'event_type',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function batter(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'batter_id', 'player_id');
    }

    public function pitcher(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'pitcher_id', 'player_id');
    }

    public function runnerFirst(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'runner_first_id', 'player_id');
    }

    public function runnerSecond(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'runner_second_id', 'player_id');
    }

    public function runnerThird(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'runner_third_id', 'player_id');
    }

    public function pitchEvent(): HasOne
    {
        return $this->hasOne(PitchEvent::class);
    }

    public function stealEvents(): HasMany
    {
        return $this->hasMany(StealEvent::class);
    }

    public function substitutionEvents(): HasMany
    {
        return $this->hasMany(SubstitutionEvent::class);
    }

    public function advancementEvents(): HasMany
    {
        return $this->hasMany(AdvancementEvent::class);
    }

    public function errorEvents(): HasMany
    {
        return $this->hasMany(ErrorEvent::class);
    }

    public function otherEvents(): HasMany
    {
        return $this->hasMany(OtherEvent::class);
    }
}
