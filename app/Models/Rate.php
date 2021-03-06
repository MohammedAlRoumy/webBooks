<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model {

    use HasFactory;
	protected $table = 'rates';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public function book()
	{
		return $this->belongsTo(Book::class, 'book_id');
	}

}
