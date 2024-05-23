<?php

namespace App\Enums;

enum UserType: string {
    case Cajero = 'cajero';
    case Administrador = 'administrador';
}
