<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_active'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function permissions()
    {
        // relationship pivot with RolePermission
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
