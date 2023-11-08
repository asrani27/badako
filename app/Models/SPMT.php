<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPMT extends Model
{
    use HasFactory;
    protected $table = 'spmt';
    protected $guarded = ['id'];
}
