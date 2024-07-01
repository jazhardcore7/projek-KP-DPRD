<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'kode_kelas',
        'jenis_arsip',
        'uraian',
        'kurun_waktu',
        'jumlah_berkas',
        'tanggal_entry',
        'uploader',
        'file',
    ];

    protected $primaryKey = 'nomor';
}
