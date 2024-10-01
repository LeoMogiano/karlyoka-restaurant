<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['nit', 'nombre', 'fecha_emision', 'pedido_id'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
