<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_rekam_medis';
    protected $table = 'pasiens';
    
    public $incrementing = false;

    protected $fillable = ['no_rekam_medis','pasien_nama','pasien_alamat','pasien_telp','pasien_jenis_kelamin','pasien_tempat_lahir','pasien_tgl_lahir','pasien_pekerjaan'];
}
