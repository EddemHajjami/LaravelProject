<?php

namespace App\Models;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = ['body'];

    public function restaurant() {

    	return $this->belongsTo(Restaurant::class);

    }

    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
