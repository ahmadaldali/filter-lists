<?php

namespace AhmadAldali\FilterLists\Template\Filter;

use AhmadAldali\FilterLists\Traits\FixRange;
use AhmadAldali\FilterLists\Traits\SaveJson;

class FilterListTemplateWithWhereBetween extends FilterListTemplateAbstract
{
    use FixRange;
    use SaveJson;

    /**
     * @param $request
     * @return void
     */
    protected function applyWhereBetween($request): void
    {
        if ($request->has('dataRange')) {
            $dataRange = $this->convertJsonToObject($request->dataRange);
            $this->builder = $this->builder->whereBetween($dataRange->from, $dataRange->to);
        }
        if ($request->has('fixRange')) {
            $fixRange = $this->getFixRangeDates($request->fixRange);
            $this->builder = $this->builder->whereBetween($fixRange['from'], $fixRange['to']);
        }
    }
}//class
