<?php

namespace AhmadAldali\FilterLists\Template\Filter;

use Illuminate\Http\Request;
use AhmadAldali\FilterLists\Filter\FilterHandler;

abstract class AbstractFilterList
{
    protected ?FilterHandler $builder = null;

    /**
     * Filters the model using provided parameters and request data.
     *
     * @param mixed $model
     * @param array $params
     * @param Request $request
     * @return mixed
     */
    final public function filter($model, array $params, Request $request)
    {
        $this->init($model, $params);
        $this->applyWhere();
        $this->applyWhereBetween($request);
        $this->applySort();

        return $this->applyPagination();
    }

    /**
     * Initializes the filter builder.
     *
     * @param mixed $model
     * @param array $params
     * @return void
     */
    protected function init($model, array $params): void
    {
        $this->builder = new FilterHandler($model, $params);
    }

    /**
     * Applies basic filtering conditions.
     *
     * @return void
     */
    protected function applyWhere(): void
    {
        $this->builder = $this->builder->where();
    }

    /**
     * Applies sorting logic.
     *
     * @return void
     */
    protected function applySort(): void
    {
        $this->builder = $this->builder->sort();
    }

    /**
     * Applies pagination to the result.
     *
     * @return mixed
     */
    protected function applyPagination()
    {
        return $this->builder->paginate();
    }

    /**
     * Applies range filtering (to be implemented in subclasses).
     *
     * @param Request $request
     * @return void
     */
    abstract protected function applyWhereBetween(Request $request): void;
}
