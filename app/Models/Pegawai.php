<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';

    protected $fillable = [
        'user_id',
        'posisi_lamar',
        'nama',
        'no_ktp',
        'ttl',
        'jenis_kelamin',
        'agama',
        'golongan_darah',
        'status',
        'alamat_ktp',
        'alamat_tinggal',
        'email',
        'no_telp',
        'orang_terdekat',
        'riwayat_pendidikan',
        'riwayat_pelatihan',
        'riwayat_pekerjaan',
        'skill',
        'penempatan_luar_kantor',
        'penghasilan',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
