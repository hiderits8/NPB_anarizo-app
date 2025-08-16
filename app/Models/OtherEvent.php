<?php

namespace App\Models;

use App\Models\PlayByPlay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtherEvent extends Model
{
    /** @use HasFactory<\Database\Factories\OtherEventFactory> */
    use HasFactory;

    protected $primaryKey = 'event_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'pbp_id',
        'event_subtype',
        'detail',
    ];

    public function playByPlay(): BelongsTo
    {
        return $this->belongsTo(PlayByPlay::class, 'pbp_id', 'pbp_id');
    }
}
