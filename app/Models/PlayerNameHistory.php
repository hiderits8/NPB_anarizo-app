<?php

namespace App\Models;

use App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlayerNameHistory extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerNameHistoryFactory> */
    use HasFactory;

    protected $primaryKey = 'history_id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    protected $fillable = [
        'player_id',
        'name',
        'name_type',
        'effective_date',
        'end_date',
    ];


    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
