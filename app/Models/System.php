<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'tb_m_system';

    protected $fillable = [
        'desc', 'value'
    ];
}
