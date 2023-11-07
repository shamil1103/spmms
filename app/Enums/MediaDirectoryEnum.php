<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum MediaDirectoryEnum: string
{
    use EnumToArray;

    case APPLICATION    = 'application';
    case USER           = 'user';
    case TECHNICIAN     = 'technician';
}
