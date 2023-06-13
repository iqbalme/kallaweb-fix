<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostProdis;
use App\Models\Kurikulum;

class Prodi extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function pendaftar(){
		return $this->hasOne(Pendaftar::class);
	}
	
	public function post_prodi(){
		return $this->hasMany(PostProdis::class);
	}

	public function kurikulum_prodi(){
		return $this->hasOne(Kurikulum::class, 'prodi_id');
	}
	
}