<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //

    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $table = 'products';
    protected $hidden = ['created_at', 'updated_at'];

    public function cat(){
        return $this->belongsTo(Category::class, 'category_ID');
    }
}
