<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookinstance extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'bookinstance_id',
        'book_name',
        'pick_date',
        'return_date',
        'in_stock',
        'reader_ticket_id'

    ];
}
