<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $primaryKey = 'id_category';

    protected $table = 'tb_category';

    protected $fillable = [
        'nama_category'
    ];
    public function product(){
        return $this->hasMany('\App\Models\Product', 'id_category', 'id_category');
    }
}
