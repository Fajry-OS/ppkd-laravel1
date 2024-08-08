<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture',
        'nama_lengkap',
        'no_telpon',
        'email',
        'deskripsi',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'alamat',
    ];
}
