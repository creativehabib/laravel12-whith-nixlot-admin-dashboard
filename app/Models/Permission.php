<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    protected $guarded = ['id'];

    public static function getAllPermissions()
    {
        return Cache::rememberForever('permissions.all', function() {
            return self::all();
        });
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
