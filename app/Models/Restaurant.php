<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function path() {
        return '/restaurants/' . $this->id;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
