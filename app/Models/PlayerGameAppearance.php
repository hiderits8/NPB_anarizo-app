<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'innings_played',
        'created_at',
        'updated_at',
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

    public function substitutionEvent(): HasMany
    {
        return $this->hasMany(SubstitutionEvent::class, 'appearance_id');
    }
}
