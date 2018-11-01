<?php
/**
 *       Filename:  Grouper.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十月 29, 上午11:45
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */

namespace MyApp\Support;

use MyApp\Support\Contracts\GroupAdapterInterface;
use MyApp\Support\Grouper\ArrayAdapter;
use MyApp\Support\Grouper\FileAdapter;

class Grouper
{
    /**
     * @param GroupAdapterInterface $adapter
     * @param $once
     * @param bool $fillvalue
     * @return \Generator
     */
    public static function group(GroupAdapterInterface $adapter, $once, $fillvalue = false)
    {

        $stop = false;
        while (!$stop) {
            $once_item = [];
            $count = 0;
            while ($count < $once) {
                try {
                    $value = $adapter->next();
                } catch (\OutOfRangeException $e) {
                    $stop = true;
                    if ($fillvalue !== false) {
                        $value = $fillvalue;
                    } else {
                        $value = null;
                        break;
                    }
                } finally {
                    $count++;
                }
                $once_item[] = $value;
            }
            if (!empty($once_item)) {
                yield $once_item;
            }
        }
    }

    /**
     * @param $array
     * @param $once
     * @param $fillvalue
     * @return \Generator
     */
    public static function array_grouper($array, $once, $fillvalue=false)
    {
        $adapter = new ArrayAdapter($array);
        return self::group($adapter, $once, $fillvalue);
    }

    /**
     * @param $fd
     * @param $once
     * @param $fillvalue
     * @return \Generator
     */
    public static function file_grouper($fd, $once, $fillvalue=false)
    {
        $adapter = new FileAdapter($fd);
        return self::group($adapter, $once, $fillvalue);
    }
}


