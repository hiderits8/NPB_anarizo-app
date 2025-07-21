<?php

namespace App\Models;

use App\Models\PlayByPlay;
use App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PitchEvent extends Model
{
    /** @use HasFactory<\Database\Factories\PitchEventFactory> */
    use HasFactory;

    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pbp_id',
        'pitcher_id',
        'batter_id',
        'pitch_velocity',
        'pitch_type',
        'pitch_location_x',
        'pitch_location_y',
        'swing',
        'hit_bases',
        'contact_made',
        'pitcher_hand',
        'batter_hand',
        'pitch_count_in_inning',
        'pitch_count_in_game',
    ];

    public function playByPlay(): BelongsTo
    {
        return $this->belongsTo(PlayByPlay::class);
    }

    public function pitcher(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'pitcher_id');
    }

    public function batter(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'batter_id');
    }
}
