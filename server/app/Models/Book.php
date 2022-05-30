<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    /**
     * define all properties that should be writeable
     * @var string[]
     */

    protected $fillable = [
        'isbn', 'title', 'subtitle', 'published', 'rating', 'description', 'user_id'
    ];

    //gibt zurück, ob buch ein fav ist oder nicht
    public function isFavourite() : bool {
        return $this->rating >= 8;
    }

    //ist dann unter favourite(); aufrufbar (via tinker)
    public function scopeFavourite($query) {
        return $query->where('rating', '>=', '8');
    }

    public function images() : HasMany {
        return $this->hasMany(Image::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function authors() : BelongsToMany {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

}
