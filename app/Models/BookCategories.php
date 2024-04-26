<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategories extends Model
{
    protected $table = 'book_cate';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    use HasFactory;
}
