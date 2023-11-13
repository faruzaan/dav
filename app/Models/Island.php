<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    public $primaryKey = 'id_island';

    protected $table = 'tb_island';

    protected $fillable = [
        'nama_island'
    ];
    public function destination(){
        return $this->hasMany('\App\Models\Destination', 'id_island', 'id_island');
    }
}
