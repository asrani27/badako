<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerja';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'unitkerja_id');
    }

    public function pegawai()
    {
        return $this->hasMany(M_pegawai::class, 'unitkerja_id');
    }
}
