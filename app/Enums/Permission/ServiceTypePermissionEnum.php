<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum ServiceTypePermissionEnum: string
{
    use EnumToArray;

    case ALL_LIST   = 'All List Service Type';
    case CREATE     = 'Create Service Type';
    case EDIT       = 'Edit Service Type';
    case DELETE     = 'Delete Service Type';
    case ACTIVATE   = 'Activate Service Type';
    case INACTIVATE = 'Inactivate Service Type';
}
