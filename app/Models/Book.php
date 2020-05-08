<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['name', 'author_id'];

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
