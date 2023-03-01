<?php

namespace App\Enums;

enum PaymentStatusEnum: int
{
    case CREATED = 1;
    case APPROVED = 2;
    case DENIED = 3;
}
