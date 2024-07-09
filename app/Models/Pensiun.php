<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensiun extends Model
{
    use HasFactory;
    protected $table = 'pensiun';
    protected $guarded = ['id'];
    public function pasangan()
    {
        return $this->hasOne(Pasangan::class, 'pensiun_id');
    }
    public function anak()
    {
        return $this->hasMany(Anak::class, 'pensiun_id');
    }
}
