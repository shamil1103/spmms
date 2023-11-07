<?php

namespace App\Enums\Permission;

use App\Traits\EnumToArray;

enum BikeModelPermissionEnum: string
{
    use EnumToArray;

    case ALL_LIST   = 'All List Bike Model';
    case CREATE     = 'Create Bike Model';
    case EDIT       = 'Edit Bike Model';
    case DELETE     = 'Delete Bike Model';
    case ACTIVATE   = 'Activate Bike Model';
    case INACTIVATE = 'Inactivate Bike Model';
}
