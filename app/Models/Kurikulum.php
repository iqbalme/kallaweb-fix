<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = "kurikulum";
    protected $guarded = [];

    public function kurikulum_prodi(){
		return $this->belongsTo(Prodi::class, 'id');
	}
}
