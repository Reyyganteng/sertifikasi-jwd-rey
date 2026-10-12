<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['skema_id', 'nama_peserta', 'nik', 'email', 'no_hp', 'alamat'];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}
