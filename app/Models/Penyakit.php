<?php

namespace App\Models;

use App\Models\Poli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
