<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    public $primaryKey = 'id_boat';

    protected $table = 'tb_boat';

    protected $fillable = [
        'boat'
    ];
    public function Detail(){
        return $this->hasMany('\App\Models\BoatDetails', 'id_boat', 'id_boat');
    }
}
