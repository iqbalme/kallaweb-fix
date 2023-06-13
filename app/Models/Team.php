<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TimProdi;

class Team extends Model
{
    use HasFactory;

	protected $guarded = [];

    public function team_prodi(){
        return $this->hasMany(TimProdi::class);
    }
}
