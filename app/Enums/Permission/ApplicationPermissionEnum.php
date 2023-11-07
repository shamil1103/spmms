<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum ApplicationPermissionEnum: string
{
    use EnumToArray;

    case READ       = 'Preview Application';
    case EDIT       = 'Edit Application';
}
