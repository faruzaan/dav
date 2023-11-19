<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public $primaryKey = 'id_tour';

    protected $table = 'tb_tour';

    protected $fillable = [
        'nama_tour', 'duration'
    ];
}
