<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['judul_event', 'deskripsi', 'kategori', 'silabus', 'durasi_menit'];
}