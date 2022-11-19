<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use HasFactory, SoftDeletes;

    //protected $kind = ['Karyawan', 'Departemen', 'Jabatan'];
    
    protected $fillable = ['name', 'filepath'];
    
}
