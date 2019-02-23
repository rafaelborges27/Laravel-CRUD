<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
	use SoftDeletes;
    //
    protected $fillable = [
        'user_id', 'name', 'description', 'color'
    ];

    protected $table = 'categories';
}
