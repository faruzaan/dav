<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    public $primaryKey = 'id_tour';

    protected $table = 'tb_tour_detail';

    protected $fillable = [
        'id_detail_tour', 'id_tour', 'id_destination', 'sequence'
    ];

    public function Tour(){
        return $this->hasOne('App\Models\Tour', 'id_tour', 'id_tour');
    }
    public function Destination(){
        return $this->hasOne('App\Models\Destination', 'id_destination', 'id_destination');
    }
}
