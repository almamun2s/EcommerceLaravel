<?php

namespace App\Enum;

enum OrderStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';
}
