<?php
/**
 *       Filename:  SupportTest.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十月 31, 下午1:07
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */

use PHPUnit\Framework\TestCase;


class MyException extends Exception {} ;

class SupportHelperTest extends TestCase
{
    /*
     * func run retries + 1 times maximal
     */
    public function testRetryCnt()
    {
        $cnt = 0;
        $func = retry(function () use (&$cnt) {
            $cnt++;
            throw new MyException('boom');
        },
            3,
            0,
            'MyException'
        );
        try {
            $func();
        } catch (Exception $e) {
        }
        $this->assertEquals(4, $cnt);
    }

    /*
     * only catch certain exception
     */
    public function testRetryException()
    {
        $cnt = 0;
        $func = retry(function () use (&$cnt) {
            $cnt++;
            throw new Exception('boom');
        },
            3,
            1,
            'MyException'
        );
        try {
            $func();
        } catch (Exception $e) {
        }
        $this->assertEquals(1, $cnt);
    }
}
