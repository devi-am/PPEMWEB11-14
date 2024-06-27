<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_grub',
        'foto_grub',
        'jenis',
        'generasi',
        'tahun_debut'
    ];

    public function group()
    {
        return $this->hasMany(Group::class);
    }
}