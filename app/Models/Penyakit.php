<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = 'id';
    protected $fillable = ['id_penyakit', 'nama_penyakit', 'detail_penyakit', 'solusi_penyakit'];
}
