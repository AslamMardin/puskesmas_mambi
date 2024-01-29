<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Poli;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedik extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
