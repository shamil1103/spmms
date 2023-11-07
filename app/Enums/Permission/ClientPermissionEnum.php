<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum ClientPermissionEnum: string
{
    use EnumToArray;

    case ALL_LIST   = 'All List Client';
    case CREATE     = 'Create Client';
    case EDIT       = 'Edit Client';
    case DELETE     = 'Delete Client';
    case ACTIVATE   = 'Activate Client';
    case INACTIVATE = 'Inactivate Client';
}
