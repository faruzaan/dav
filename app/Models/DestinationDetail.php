<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationDetail extends Model
{
    public $primaryKey = 'id_destination_detail';

    protected $table = 'tb_destination_detail';

    protected $fillable = [
        'id_destination_detail', 'nama_destination', 'id_destination', 'foto'
    ];

    public function Destination(){
        return $this->hasOne('App\Models\Destination', 'id_destination', 'id_destination');
    }
}
