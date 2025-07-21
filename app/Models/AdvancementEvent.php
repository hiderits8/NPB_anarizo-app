<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvancementEvent extends Model
{
    /** @use HasFactory<\Database\Factories\AdvancementEventFactory> */
    use HasFactory;

    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pbp_id',
        'player_id',
        'from_base',
        'to_base',
    ];

    public function playByPlay(): BelongsTo
    {
        return $this->belongsTo(PlayByPlay::class, 'pbp_id', 'pbp_id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
