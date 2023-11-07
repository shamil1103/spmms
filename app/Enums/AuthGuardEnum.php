<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum AuthGuardEnum: string {

    case WEB   = 'web';
    case ADMIN = 'admin';

}
