<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itenary extends Model
{
    public $primaryKey = 'id_itenary';

    protected $table = 'tb_itenary';

    protected $fillable = [
        'id_itenary', 'id_tour', 'desc'
    ];
    public function Tour(){
        return $this->hasOne('App\Models\Tour', 'id_tour', 'id_tour');
    }
    public function Details(){
        return $this->hasMany('App\Models\ItenaryDetail', 'id_itenary', 'id_itenary');
    }
}
