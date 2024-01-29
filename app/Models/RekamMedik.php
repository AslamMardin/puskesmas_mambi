<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekamMedik extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
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
