<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Accessor untuk umur pasien
    public function getUmurAttribute()
    {
        return now()->diffInYears($this->ttl);
    }
    protected $table = 'pasiens'; // Nama tabel sesuai dengan informasi

    // ...

    public function rekamMediks()
    {
        return $this->hasMany(RekamMedik::class, 'pasien_id');
    }

}
