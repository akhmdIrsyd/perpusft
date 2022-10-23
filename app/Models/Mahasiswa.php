<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_mhs',
        'nim',
        'id_jurusan',
        'no_hp',
        'email',
        'status',
    ];
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
