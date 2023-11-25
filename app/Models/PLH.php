<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLH extends Model
{
    use HasFactory;
    protected $table = 'plh';
    protected $guarded = ['id'];
}
