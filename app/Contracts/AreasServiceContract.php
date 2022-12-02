<?php

namespace App\Contracts;

use App\Models\Land;

interface AreasServiceContract
{
    public function hasSpaceForArea(Land $land, int $unusedArea, int $area): bool;
}
