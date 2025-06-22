<?php

namespace AhmadAldali\FilterLists\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Foundation\Application;
use AhmadAldali\FilterLists\Template\Filter\FilterListBase;
use AhmadAldali\FilterLists\Template\Filter\FilterListWithRange;

trait FilterableResponse
{
    /**
     * Generate a filtered result list based on the request and additional parameters.
     *
     * @param \Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Builder $model
     * @param Request $request
     * @param array $addedParams
     * @return Application|ResponseFactory|Response
     */
    public function applyFilters($model, Request $request, array $addedParams = [])
    {
        if ($model->count() === 0) {
            return response(['data' => []], 200);
        }

        $query = $model->toQuery();

        $params = array_merge(
            $request->except(['dataRange', 'fixRange']),
            $addedParams
        );

        $template = $request->hasAny(['dataRange', 'fixRange'])
            ? new FilterListWithRange()
            : new FilterListBase();

        $records = $template->filter($query, $params, $request);

        return response($records, 200);
    }
}
