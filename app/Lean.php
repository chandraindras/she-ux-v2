<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lean extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'lean_name', 'problem', 'solution', 'existing_alternatives', 'key_metric', 'unique_value', 'high_level_concept', 'unfair_advantage', 'channel', 'customer_segment', 'early_adopter', 'cost_structure', 'revenue_stream'];
}
