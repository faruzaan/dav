<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public $primaryKey = 'id_destination';

    protected $table = 'tb_destination';

    protected $fillable = [
        'nama_destination', 'foto', 'maps'
    ];
    public function Detail(){
        return $this->hasMany('\App\Models\DestinationDetail', 'id_destination', 'id_destination');
    }
    public function Tour(){
        return $this->hasMany('\App\Models\TourDetail', 'id_destination', 'id_destination');
    }
}
