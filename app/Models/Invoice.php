<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function pendaftar(){
		return $this->hasOne(Pendaftar::class);
	}
	
	public function invoice_items(){
		return $this->hasMany(InvoiceItem::class);
	}
}
