<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'jabatan',
        'hp',
        'gambar',
    ];
    protected $hidden = ['password'];
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    // Mendapatkan identifier untuk otentikasi
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    // Mendapatkan password yang akan digunakan untuk otentikasi
    public function getAuthPassword()
    {
        return $this->password;
    }
}
