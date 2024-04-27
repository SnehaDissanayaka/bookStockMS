<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLending extends Model
{
    public $timestamps = false;

    protected $table = 'book_user';
    protected $primaryKey = 'id';
    protected $fillable = ['name','user_id','book_id','returned_at'];
    use HasFactory;
}
