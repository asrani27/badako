<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengangkatanCPNS extends Model
{
    use HasFactory;
    protected $table = 'permohonan_cpns';
    protected $guarded = ['id'];
    public function file()
    {
        return $this->hasMany(PengangkatanCpnsFile::class, 'permohonan_cpns_id');
    }
    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id');
    }
    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
