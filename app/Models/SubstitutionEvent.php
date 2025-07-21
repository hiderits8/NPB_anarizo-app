<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubstitutionEvent extends Model
{
    /** @use HasFactory<\Database\Factories\SubstitutionEventFactory> */
    use HasFactory;

    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pbp_id',
        'from_position',
        'to_position',
        'player_id',
        'appearance_id',
    ];

    public function playByPlay(): BelongsTo
    {
        return $this->belongsTo(PlayByPlay::class, 'pbp_id', 'pbp_id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function playerGameAppearance(): BelongsTo
    {
        return $this->belongsTo(PlayerGameAppearance::class, 'appearance_id', 'appearance_id');
    }
}
