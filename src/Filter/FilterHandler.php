<?php

namespace AhmadAldali\FilterLists\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FilterHandler implements FilterContract
{
    private Builder $model;
    private array $list;

    /**
     * @param Builder $model
     * @param array $list
     */
    public function __construct(Builder $model, array $list)
    {
        $this->model = $model;
        $this->list = $list;
    }

    /**
     * Apply basic where conditions (excluding pagination/sorting keys).
     *
     * @return FilterContract
     */
    public function where(): FilterContract
    {
        $conditions = array_diff_key($this->list, array_flip(['page', 'limit', 'desc', 'sortBy']));

        foreach ($conditions as $key => $value) {
            $this->model->where($key, $value);
        }

        return $this;
    }

    /**
     * Apply a whereBetween clause.
     *
     * @param string $begin
     * @param string $end
     * @param string $column
     * @return FilterContract
     */
    public function whereBetween(string $begin, string $end, string $column = 'created_at'): FilterContract
    {
        $this->model->whereBetween($column, [$begin, $end]);
        return $this;
    }

    /**
     * Apply sorting to the query.
     *
     * @return FilterContract
     */
    public function sort(): FilterContract
    {
        if (isset($this->list['sortBy'])) {
            $sortType = (!empty($this->list['desc']) && $this->list['desc'] == 1) ? 'desc' : 'asc';
            $this->model = $this->model->orderBy($this->list['sortBy'], $sortType);
        }

        return $this;
    }

    /**
     * Paginate the result based on the limit.
     *
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        $limit = (isset($this->list['limit']) && $this->list['limit'] >= 0)
            ? $this->list['limit']
            : 15; // Default fallback limit

        return $this->model->paginate($limit);
    }
}
