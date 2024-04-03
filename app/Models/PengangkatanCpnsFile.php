<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengangkatanCpnsFile extends Model
{
    use HasFactory;
    protected $table = 'permohonan_cpns_file';
    protected $guarded = ['id'];
    public function permohonan()
    {
        return $this->belongsTo(PengangkatanCPNS::class, 'permohonan_cpns_id');
    }
}
