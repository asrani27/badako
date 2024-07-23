<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KenaikanPangkat extends Model
{
    use HasFactory;
    protected $table = 'kenaikan_pangkat';
    protected $guarded = ['id'];
}
