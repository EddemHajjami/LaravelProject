<?php


namespace App\Models\Enums;


use App\Models\Enum;

abstract class Status Extends Enum
{
    const locked = 0;
    const unlocked = 1;
}
