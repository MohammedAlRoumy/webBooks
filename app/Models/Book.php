<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{

    use HasFactory;

    protected $table = 'books';
    public $timestamps = true;
    protected $fillable = ['name', 'status', 'description', 'image', 'category_id', 'author_id', 'rate_count', 'rate_average', 'download_count'];
   // protected $appends = ['category','author'];
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];
    protected $dates = ['deleted_at'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }


   /* public function getCategoryAttribute()
    {
        return $this->category()->where('id', $this->category_id)->pluck('name')->first();
    }

    public function getAuthorAttribute()
    {
        return $this->author()->where('id', $this->author_id)->pluck('name')->first();
    }*/
}
