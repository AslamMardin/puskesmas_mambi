<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = [];
    use HasFactory;
    // Accessor untuk umur pasien
    public function getUmurAttribute()
    {
        return now()->diffInYears($this->ttl);
    }

}
