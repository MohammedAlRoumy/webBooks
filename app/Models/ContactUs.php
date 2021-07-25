<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'title', 'message'];
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];
    protected $dates = ['deleted_at'];

}
