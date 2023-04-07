<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wadai extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $fillable = ['nama', 'harga',];
}
