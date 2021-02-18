<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = "games";
	protected $fillable = [
        "id",
        "user_id",
        "name",
        "describe",
        "play_time",
        "players_minimum",
        "players_max",
        "image_path",
        "updated_at",
        "created_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
