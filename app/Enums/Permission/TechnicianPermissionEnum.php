<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum TechnicianPermissionEnum: string
{
    use EnumToArray;

    case ALL_LIST   = 'All List Technician';
    case CREATE     = 'Create Technician';
    case EDIT       = 'Edit Technician';
    case DELETE     = 'Delete Technician';
    case ACTIVATE   = 'Activate Technician';
    case INACTIVATE = 'Inactivate Technician';
}
