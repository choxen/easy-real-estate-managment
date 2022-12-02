<?php

namespace App\Services;

use App\Contracts\AreasServiceContract;
use App\Models\Land;

class AreasService implements AreasServiceContract
{
    public function hasSpaceForArea(Land $land, int $unusedArea = 0, int $area): bool
    {
        return ($land->areas->sum('area_covered') - $unusedArea) + $area <= $land->total_area;
    }
}
