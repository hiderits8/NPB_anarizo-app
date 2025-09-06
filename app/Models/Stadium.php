<?php

namespace App\Models;

use App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    /** @use HasFactory<\Database\Factories\StadiumFactory> */
    use HasFactory;

    protected $table = 'stadiums';
    protected $primaryKey = 'stadium_id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    protected $fillable = [
        'stadium_name',
        'is_dome',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'stadium_id', 'stadium_id');
    }
}
