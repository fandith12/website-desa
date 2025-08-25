<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Izinkan kolom-kolom ini untuk diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
