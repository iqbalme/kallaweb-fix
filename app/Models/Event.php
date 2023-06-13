<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\CommonTrait;
use App\Models\EventProdi;

class Event extends Model
{
    use HasFactory;
	use CommonTrait;

	protected $guarded = [];
	protected $dates = ['waktu_mulai', 'waktu_berakhir'];

	protected $appends = array('event_excerpt'); //menambahkan field baru pada respon

	public function getEventExcerptAttribute()
    {
        return strip_tags($this->removeContentTag($this->deskripsi_event));
    }

	public function peserta_event(){
		return $this->hasMany(PesertaEvent::class);
	}

    public function event_prodi(){
        return $this->hasMany(EventProdi::class);
    }

}
