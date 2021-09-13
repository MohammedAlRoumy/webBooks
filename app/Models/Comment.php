<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

    use HasFactory;
	protected $table = 'comments';
	public $timestamps = true;

	use SoftDeletes;

	protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

	protected $dates = ['deleted_at'];

	public function book()
	{
		return $this->belongsTo(Book::class, 'book_id');
	}

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
