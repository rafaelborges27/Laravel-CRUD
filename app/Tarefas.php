<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefas extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id' ,'user_id', 'priority', 'description', 'done', 'end_forecast_date'
    ];

    protected $table = 'tasks';
}
