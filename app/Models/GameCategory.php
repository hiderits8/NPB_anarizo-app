<?php

namespace App\Models;

use App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameCategory extends Model
{
    /** @use HasFactory<\Database\Factories\GameCategoryFactory> */
    use HasFactory;

    protected $primaryKey = 'category_id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    protected $fillable = [
        'category_name',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'category_id', 'category_id');
    }
}
