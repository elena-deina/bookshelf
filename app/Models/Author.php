<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable = ['last_name', 'first_name', 'middle_name'];

    /**
     * @return HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name} {$this->middle_name}";
    }
}
