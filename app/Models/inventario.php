<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios';
    protected $fillable = ['status','codigo','equipo','modelo','serie','marca','descripcion','cantidad','nota','fecha_compra'];
}
