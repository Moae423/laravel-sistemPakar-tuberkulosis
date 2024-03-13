<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = 'id';
    protected $fillable = ['namaPasien', 'email', 'password', 'umur', 'jenisKelamin', 'alamat', 'nohp'];
}
