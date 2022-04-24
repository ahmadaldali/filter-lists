<?php

namespace AhmadAldali\FilterLists\Filter;

interface FilterInterface
{
    public function where(): FilterInterface;

    public function whereBetween($begin, $end, string $column = 'created_at'): FilterInterface;

    public function sort(): FilterInterface;

    public function paginate();
}
