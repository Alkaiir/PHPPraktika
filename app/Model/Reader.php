<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'reader_ticket_id',
        'name',
        'surname',
        'patronymic'

    ];

}
