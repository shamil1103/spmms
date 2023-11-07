<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum ClientServiceStatusEnum: string
{
    use EnumToArray;

    case WAITING    = 'Waiting';
    case WORKING    = 'Working';
    case DONE       = 'Done';
}
