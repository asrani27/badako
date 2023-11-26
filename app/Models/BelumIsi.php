<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelumIsi extends Model
{
    use HasFactory;
    protected $table = 'belumisi';
    protected $guarded = ['id'];
    public $timestamps = false;
}
