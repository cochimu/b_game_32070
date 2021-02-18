<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
	protected $fillable = [
        "id",
        "game_id",
        "name",
        "text",
        "updated_at",
        "created_at",
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
