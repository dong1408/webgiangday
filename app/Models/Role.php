<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',   
        'description',
    ];

    public function permissions(){
        return $this->BelongsToMany('App\Models\Permission', 'role_permission');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
