<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model {

    use HasFactory;
	protected $table = 'authors';
	public $timestamps = true;
    protected $fillable = ['name','status','bio','image'];
	use SoftDeletes;

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];
	protected $dates = ['deleted_at'];

	public function books()
	{
		return $this->hasMany(Book::class);
	}

}
