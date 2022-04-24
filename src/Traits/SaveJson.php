<?php

namespace AhmadAldali\FilterLists\Traits;

trait SaveJson
{
    /**
     * @param $data
     * @return mixed
     */
    public function convertJsonToObject($data)
    {
        return json_decode($data);
    } //method

}//trait
