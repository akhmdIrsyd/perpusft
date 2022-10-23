<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_beli',
        'id_buku',
        'NIM_mhs',
        'status',
    ];
    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM_mhs');
    }
}
