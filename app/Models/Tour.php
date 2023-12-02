<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public $primaryKey = 'id_tour';

    protected $table = 'tb_tour';

    protected $fillable = [
        'nama_tour', 'duration', 'desc', 'desc_header', 'tour_detail', 'include', 'header1', 'header2', 'price_usd', 'price_idr', 'foto', 'program', 'content2'
    ];
    public function Detail(){
        return $this->hasMany('App\Models\TourDetail', 'id_tour', 'id_tour');
    }
}
