<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class RoleUser extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
	
	public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}