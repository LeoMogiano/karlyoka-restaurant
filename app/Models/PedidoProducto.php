<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;


    protected $fillable = ['cantidad', 'subtotal' ,'producto_id' , 'pedido_id'];


    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function pedidos()
    {
        return $this->belongsTo(Pedido::class);
    }
}

