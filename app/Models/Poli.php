<?php

namespace App\Models;

use App\Models\Penyakit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function penyakit(){
        return $this->hasMany(Penyakit::class);
    }
}
