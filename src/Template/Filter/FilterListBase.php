<?php

namespace AhmadAldali\FilterLists\Template\Filter;

use Illuminate\Http\Request;

class FilterListBase extends AbstractFilterList
{
    /**
     * Apply range-based filtering using either a custom data range or a fixed range.
     *
     * @param Request $request
     * @return void
     */
    protected function applyWhereBetween(Request $request): void
    {
        // No range filtering is applied in this template.
        // This method can be overridden in subclasses if needed.
        // The base class does not implement any range filtering logic.
        // This allows for flexibility in extending the functionality
        // without enforcing a specific behavior in this template.
    }
}
