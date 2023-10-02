<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_jenis_surat',
        'tanggal_surat',
        'ringkasan',
        'file',
        'id_user'
    ];
    public $timestamps = false;

    public function jenis()
    {
        return $this->belongsTo(JenisSurat::class, 'id_jenis_surat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
