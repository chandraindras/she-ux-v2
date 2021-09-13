<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_persona extends Model
{
    protected $guarded = [];
    protected $fillable = ['id_project', 'persona_name', 'avatar', 'quote', 'age', 'work', 'family', 'location', 'bio', 'goal', 'frustation', 'device', 'media', 'personality', 'fear', 'achievement', 'growth', 'social'];

    // public function setDeviceAttribute($value)
    // {
    //     $this->attributes['device'] = json_encode($value);
    // }

    // // public function getDeviceAttribute($value)
    // // {
    // //     return $this->attributes['device'] = json_decode($value);
    // // }

    // public function setMediaAttribute($value)
    // {
    //     $this->attributes['media'] = json_encode($value);
    // }

    // public function getMediaAttribute($value)
    // {
    //     return $this->attributes['media'] = json_decode($value);
    // }
}
