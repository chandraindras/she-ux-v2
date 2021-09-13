<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    protected $fillable = ['email_user', 'project_name', 'project_desc'];
}
