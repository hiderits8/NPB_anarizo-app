<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'steal_success',
    ];
}
