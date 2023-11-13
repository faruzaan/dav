<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public $primaryKey = 'id_destination';

    protected $table = 'tb_destination';

    protected $fillable = [
        'id_destination', 'nama_destination', 'id_island', 'foto'
    ];

    public function island(){
        return $this->hasOne('App\Models\Island', 'id_island', 'id_island');
    }
}
