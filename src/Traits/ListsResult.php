<?php

namespace AhmadAldali\FilterLists\Traits;

use AhmadAldali\FilterLists\Template\Filter\FilterListTemplate;
use AhmadAldali\FilterLists\Template\Filter\FilterListTemplateWithWhereBetween;

trait ListsResult
{
    /**
     * @param $model
     * @param $request
     * @param array $addedParams
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getTheResult($model, $request, array $addedParams = [])
    {
        //check if there is no list
        if (count($model) == 0) {
            return response(['data' => []], 200);
        }
        $model = $model->toQuery();
        $params = $request->except(['dataRange', 'fixRange']);
        foreach ($addedParams as $key => $value) {
            $params[$key] = $value;
        }
        if ($request->has('dataRange') || $request->has('fixRange')) {
            $template = new FilterListTemplateWithWhereBetween();
        } else {
            $template = new FilterListTemplate();
        }
        $records = $template->filter($model, $params, $request);
        return response($records, 200);
    }
}//trait
