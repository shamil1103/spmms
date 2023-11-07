<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum ClientServicePermissionEnum: string
{
    use EnumToArray;

    case ALL_LIST   = 'All List Client Service';
    case CREATE     = 'Create Client Service';
    case EDIT       = 'Edit Client Service';
    case DELETE     = 'Delete Client Service';
    case WAITING    = 'Waiting Client Service';
    case WORKING    = 'Working Client Service';
    case DONE       = 'Done Client Service';
}
