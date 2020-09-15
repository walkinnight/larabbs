<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //不需要更新create_at update_at
    public $timestamps = false;

    protected $fillable = [
      'name','description',
    ];


}
