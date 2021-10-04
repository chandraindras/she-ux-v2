<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_comparison','id_project', 'comparison_name', 'aspect', 'competitor1', 'competitor2', 'competitor3', 'competitor4', 'competitor5'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }
}
