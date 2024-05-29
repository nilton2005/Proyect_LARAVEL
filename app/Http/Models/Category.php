<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'categories';
    protected $hidden = ['creted_at', 'updated_at'];


}
