<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function quotes()
    {
    	return $this->hasMany('App\Models\Quote', 'category_id');
    }
}
