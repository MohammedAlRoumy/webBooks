<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

    use HasFactory;
	protected $table = 'categories';
	protected $fillable = ['name','status'];

	use SoftDeletes;

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    protected $dateFormat = 'Y-m-d';
	protected $dates = ['deleted_at','created_at'];


	public function books()
	{
		return $this->hasMany(Book::class);
	}

}
