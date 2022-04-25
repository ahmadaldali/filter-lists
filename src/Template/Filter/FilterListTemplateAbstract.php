<?php


namespace AhmadAldali\FilterLists\Template\Filter;

use AhmadAldali\FilterLists\Filter\FilterBuilder;

abstract class FilterListTemplateAbstract
{
    protected $builder = null;

    /**
     * @param $model
     * @param $params
     * @param $request
     * @return mixed
     */
    final public function filter($model, $params, $request)
    {
        //step1 - take object from the builder
        $this->init($model, $params);
        //step2 - apply normal conditions
        $this->applyWhere();
        //step3- apply range conditions
        $this->applyWhereBetween($request);
        //step4- sort the results
        $this->applySort();
        //step5- perform  pagination and get the results
        return $this->applyPagination();
    }

    /**
     * @param $model
     * @param $params
     * @return void
     */
    protected function init($model, $params): void
    {
        $this->builder = new FilterBuilder($model, $params);
    }

    /**
     * @return void
     */
    protected function applyWhere(): void
    {
        $this->builder = $this->builder->where();
    }

    /**
     * @return void
     */
    protected function applySort(): void
    {
        $this->builder = $this->builder->sort();
    }

    /**
     * @return mixed
     */
    protected function applyPagination()
    {
        return $this->builder->paginate();
    }

    /**
     * @param $request
     * @return void
     */
    protected function applyWhereBetween($request): void
    {
        //not where between for this collection
        //$this->builder = $this->builder;
    }

}//class
