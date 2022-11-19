<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Dokumen;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['full_name', 'email', 'handphone', 'pob', 'dob', 'dep_id', 'jabatan_id', 'doc_id'];

    public function dokumen(){
        return $this->belongsTo(Dokumen::class, 'doc_id', 'id');
    }

    
}
