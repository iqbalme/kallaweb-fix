<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function role_user(){
		return $this->hasMany(RoleUser::class);
	}
	
	public function prodi(){
		return $this->belongsTo(Prodi::class);
	}
}
