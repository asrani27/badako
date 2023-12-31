<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pegawai extends Model
{
    use HasFactory;
    protected $table = 'm_pegawai';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'pegawai_id');
    }
    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unitkerja_id');
    }
    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id');
    }
}
