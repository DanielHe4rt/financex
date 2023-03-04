<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case CREATED = 'created';
    case APPROVED = 'approved';
    case DENIED = 'denied';
}
