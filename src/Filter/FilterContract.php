<?php

namespace AhmadAldali\FilterLists\Filter;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FilterContract
{
    /**
     * Apply standard where conditions.
     *
     * @return FilterContract
     */
    public function where(): FilterContract;

    /**
     * Apply a range filter between two values on a column.
     *
     * @param string $begin
     * @param string $end
     * @param string $column
     * @return FilterContract
     */
    public function whereBetween(string $begin, string $end, string $column = 'created_at'): FilterContract;

    /**
     * Apply sorting to the query.
     *
     * @return FilterContract
     */
    public function sort(): FilterContract;

    /**
     * Paginate the query results.
     *
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator;
}
