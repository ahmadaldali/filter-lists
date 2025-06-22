<?php

namespace AhmadAldali\FilterLists\Template\Filter;

use Illuminate\Http\Request;
use AhmadAldali\FilterLists\Traits\FixedRangeFilter;
use AhmadAldali\FilterLists\Traits\JsonSerializableTrait;

class FilterListWithRange extends AbstractFilterList
{
    use FixedRangeFilter, JsonSerializableTrait;

    /**
     * Apply range-based filtering using either a custom data range or a fixed range.
     *
     * @param Request $request
     * @return void
     */
    protected function applyWhereBetween(Request $request): void
    {
        if ($request->filled('dataRange')) {
            $dataRange = $this->decodeJsonToObject($request->input('dataRange'));
            if (isset($dataRange->from, $dataRange->to)) {
                $this->builder = $this->builder->whereBetween($dataRange->from, $dataRange->to);
            }
        }

        if ($request->filled('fixRange')) {
            $fixRange = $this->getDateRangeForPeriod($request->input('fixRange'));
            $this->builder = $this->builder->whereBetween($fixRange['from'], $fixRange['to']);
        }
    }
}
