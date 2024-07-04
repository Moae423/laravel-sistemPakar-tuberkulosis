<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $table = 'penyakits';
    public function rules()
    {
        return $this->belongsTo(Rule::class);
    }
}
