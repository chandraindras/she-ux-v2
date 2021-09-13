<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparison_matrix extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'comparison_name', 'aspect', 'competitor1', 'competitor2', 'competitor3', 'competitor4', 'competitor5'];
}
