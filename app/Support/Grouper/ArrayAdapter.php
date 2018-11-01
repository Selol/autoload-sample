<?php namespace MyApp\Support\Grouper;

/**
 *       Filename:  ArrayAdapter.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十一月 01, 上午11:34
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */

use MyApp\Support\Contracts\GroupAdapterInterface;

class ArrayAdapter implements GroupAdapterInterface
{
    public $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }


    public function next()
    {
        $key = key($this->array);
        if (!is_null($key)) {
            $value = current($this->array);
            next($this->array);
            return $value;
        } else {
            throw new \OutOfRangeException('StopIteration');
        }
    }

    public function reset()
    {
        reset($this->array);
    }
}
