<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['nro', 'fecha_recepcion', 'fecha_entrega', 'total', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
