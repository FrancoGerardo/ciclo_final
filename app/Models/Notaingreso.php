<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaingreso extends Model
{
    use HasFactory;
    protected $table = 'notaingresos';
    protected $fillable = ['proveedor', 'fecha'];
    public function productos(){
        return $this->belongsToMany(Producto::class, 'detallenotaingresos');
    }
}
