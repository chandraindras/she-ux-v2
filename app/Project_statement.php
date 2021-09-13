<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_statement extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'project_statement_name', 'project_sponsor', 'project_manager', 'date_approval', 'date_revisian', 'scope', 'deliverable', 'acceptance', 'constraint', 'assumption'];
}
