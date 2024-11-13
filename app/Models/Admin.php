<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // Tambahkan jika perlu notifikasi
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable // Ubah ini dari Model ke Authenticatable
{
    use HasFactory, Notifiable; // Tambahkan Notifiable jika ingin fitur notifikasi

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    // Tambahkan metode lainnya jika diperlukan
}
