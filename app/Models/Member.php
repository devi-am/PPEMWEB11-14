<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_group',
        'nama_panggung',
        'nama_asli',
        'tanggal_lahir',
        'kewarganegaraan',
        'foto_member'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'id_group');
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}