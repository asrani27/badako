<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapus extends Model
{
    use HasFactory;

    protected $table = 'kapus';
    protected $guarded = ['id'];
    public $timestamps = false;
}
