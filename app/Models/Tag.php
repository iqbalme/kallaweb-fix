<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostTags;

class Tag extends Model
{
    use HasFactory;

	protected $guarded = [];
	
	public function post_tag(){
		return $this->hasMany(PostTags::class);
	}
	
}