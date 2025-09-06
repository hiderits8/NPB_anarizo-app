<?php

namespace App\Models;

use App\Models\PlayByPlay;
use App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StealEvent extends Model
{
    /** @use HasFactory<\Database\Factories\StealEventFactory> */
    use HasFactory;

    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pbp_id',
        'runner_id',
        'attempted_base',
        'steal_success',
    ];

    public function playByPlay(): BelongsTo
    {
        return $this->belongsTo(PlayByPlay::class, 'pbp_id', 'pbp_id');
    }

    public function runner(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'runner_id', 'player_id');
    }
}
