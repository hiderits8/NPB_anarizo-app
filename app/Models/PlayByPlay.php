<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'count_b',
        'count_s',
        'count_o',
        'runner_first_id',
        'runner_second_id',
        'runner_third_id',
        'event_type',
        'created_at',
        'updated_at',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function pitchEvent(): HasOne
    {
        return $this->hasOne(PitchEvent::class, 'pbp_id', 'pbp_id');
    }

    public function stealEvent(): HasOne
    {
        return $this->hasOne(StealEvent::class, 'pbp_id', 'pbp_id');
    }

    public function substitutionEvent(): HasOne
    {
        return $this->hasOne(SubstitutionEvent::class, 'pbp_id', 'pbp_id');
    }

    public function advancementEvent(): HasOne
    {
        return $this->hasOne(AdvancementEvent::class, 'pbp_id', 'pbp_id');
    }

    public function errorEvent(): HasOne
    {
        return $this->hasOne(ErrorEvent::class, 'pbp_id', 'pbp_id');
    }

    public function otherEvent(): HasOne
    {
        return $this->hasOne(OtherEvent::class, 'pbp_id', 'pbp_id');
    }
}
