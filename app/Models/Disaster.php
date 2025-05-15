<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $table = 'disasters'; // Nama tabel
    protected $fillable = ['location', 'disaster', 'description', 'latitude', 'longitude']; // Kolom yang bisa diisi
}


