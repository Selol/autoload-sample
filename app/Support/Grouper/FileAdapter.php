<?php namespace MyApp\Support\Grouper;

/**
 *       Filename:  FileAdapter.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十一月 01, 上午11:41
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */

use MyApp\Support\Contracts\GroupAdapterInterface;

class FileAdapter implements GroupAdapterInterface
{
    public $fd;

    public function __construct($fd)
    {
        $this->fd = $fd;
    }


    public function next()
    {
        if (($line = fgets($this->fd)) !== false) {
            return rtrim($line);
        } else {
            throw new \OutOfRangeException('StopIteration');
        }
    }

    public function reset()
    {
        rewind($this->fd);
    }
}
