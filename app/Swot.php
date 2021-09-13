<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swot extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'swot_name', 'strength', 'weakness', 'opprotunity', 'threat'];
}
