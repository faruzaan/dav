<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItenaryDetail extends Model
{
    public $primaryKey = 'id_itenary_detail';

    protected $table = 'tb_itenary_detail';

    protected $fillable = [
        'id_itenary_detail', 'id_itenary', 'desc', 'foto'
    ];
    public function Itenary(){
        return $this->hasOne('App\Models\Itenary', 'id_itenary_detail', 'id_itenary_detail');
    }
}
