<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $primaryKey = 'id_product';

    protected $table = 'tb_product';

    protected $fillable = [
        'id_product', 'nama_product', 'id_category', 'foto', 'desc'
    ];

    public function category(){
        return $this->hasOne('App\Models\Category', 'id_category', 'id_category');
    }
}
