<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Role extends Model
{
    protected $guarded = ['id'];

    public static function getAllRoles()
    {
        return Cache::rememberForever('roles.all', function() {
            return self::withCount('permissions')->latest('id')->get();
        });
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
