<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'book_name',
        'author',
        'annotation',
        'price',
        'publication_year',
        'new_publication',
        'instances_count'
    ];
}
