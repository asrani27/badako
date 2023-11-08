<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkala extends Model
{
    use HasFactory;
    protected $table = 'berkala';
    protected $guarded = ['id'];
}
