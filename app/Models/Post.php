<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
use App\Http\Traits\CommonTrait;

class Post extends Model
{
	use CommonTrait;
    use HasFactory;

	protected $guarded = [];

	protected $appends = array('post_excerpt', 'post_user', 'post_prodi', 'post_tags', 'post_categories'); //menambahkan field baru pada respon

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function post_prodi_data(){
		return $this->hasMany(PostProdis::class);
	}

	public function post_categories_data(){
		return $this->hasMany(PostCategory::class);
	}

	public function post_tags_data(){
		return $this->hasMany(PostTags::class);
	}

	public function getPostExcerptAttribute()
    {
        return substr(strip_tags($this->removeContentTag($this->konten)),0,140);
    }

	public function getPostUserAttribute()
    {
        return $this->user;
    }

	public function getPostProdiAttribute()
    {
        return $this->post_prodi_data;
    }

	public function getPostTagsAttribute()
    {
        return $this->post_tags_data;
    }

	public function getPostCategoriesAttribute()
    {
        return $this->post_categories_data;
    }

}
