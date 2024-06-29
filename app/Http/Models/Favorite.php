<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $dates = ['delete_at'];
    protected $table = 'user_favorites';
    protected $hidden = ['created_at', 'updated_at'];
}
