<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function penyakit(): HasMany
    {
        return $this->hasMany(penyakit::class);
    }
    public function gejala(): HasMany
    {
        return $this->hasMany(penyakit::class);
    }
}
