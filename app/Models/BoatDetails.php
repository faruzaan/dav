<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatDetail extends Model
{
    public $primaryKey = 'id_boat_detail';

    protected $table = 'tb_boat_detail';

    protected $fillable = [
        'id_boat_detail', 'nama_boat', 'id_boat', 'foto', 'desc'
    ];

    public function Boat(){
        return $this->hasOne('App\Models\Category', 'id_category', 'id_category');
    }
}
