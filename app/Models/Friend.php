<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "friends";
    protected $fillable = ['user', 'friend','status'];


    // public function user()
    // {
    //     return $this->belongsToMany('App\Models\User', 'friend', 'id');
    // }

    public function list_teman()
    {
        return $this->hasMany('App\Models\User', 'id', 'friend');
    }

    public function walik()
    {
        return $this->belongsTo('App\Models\User', 'id', 'friend');
    }
}
