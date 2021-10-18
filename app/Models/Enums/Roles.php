<?php

namespace App\Models\Enums;

use App\Models\Enum;

abstract class Roles extends Enum
{
    const reviewer = 0;
    const admin = 1;
}
