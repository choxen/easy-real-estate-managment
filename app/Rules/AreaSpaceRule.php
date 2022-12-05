<?php

namespace App\Rules;

use App\Models\Land;
use Illuminate\Contracts\Validation\Rule;

class AreaSpaceRule implements Rule
{
    private Land $land;
    private int $coveredArea;
    private int $unusedArea;

    public function __construct(Land $land, int $coveredArea = 0, int $unusedArea = 0)
    {
        $this->land = $land;
        $this->$coveredArea = $coveredArea;
        $this->unusedArea = $unusedArea;
    }

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = $value ? $value : $this->coveredArea;

        return ($this->land->areas->sum('area_covered') - $this->unusedArea) + $value <= $this->land->total_area;
    }

    public function message(): string
    {
        return 'This land has not enough total area for this amount of area covered';
    }
}
