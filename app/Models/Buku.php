<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_buku',
        'penulis',
        'penerbit',
        'harga',
        'exemplar',
        'jumlah',
        'id_jurusan'
    ];
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
