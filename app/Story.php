<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'story_name', 'as_a', 'i_want', 'so_that'];
}
