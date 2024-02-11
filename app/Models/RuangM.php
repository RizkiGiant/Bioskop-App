<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangM extends Model
{
    use HasFactory;
    protected $table = "ruang";
    protected $fillable = ["id", "nama", "jumlah_kursi"];
}
