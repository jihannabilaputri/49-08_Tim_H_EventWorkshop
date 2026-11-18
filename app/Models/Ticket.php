<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['tipe_tiket', 'harga', 'kuota', 'benefit'];
}