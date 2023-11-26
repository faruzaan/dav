<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $primaryKey = 'id';

    protected $table = 'tb_m_menu';

    protected $fillable = [
        'id', 'parent_id', 'menu', 'url'
    ];
    public function MenuChild(){
        return $this->hasMany('\App\Models\Menu', 'parent_id', 'id');
    }
}
