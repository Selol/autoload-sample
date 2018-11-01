<?php
/**
 *       Filename:  SupportGrouperTest.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十一月 01, 上午11:12
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */


use PHPUnit\Framework\TestCase;
use MyApp\Support\Grouper;
use MyApp\Support\Grouper\ArrayAdapter;
use MyApp\Support\Grouper\FileAdapter;


class SupportGrouperTest extends TestCase
{
    /**
     * @expectedException OutOfRangeException
     */
    public function testArrayAdapter() {
        $adapter = new ArrayAdapter([1,2]);
        $this->assertEquals(1, $adapter->next());
        $this->assertEquals(2, $adapter->next());
        $adapter->reset();
        $this->assertEquals(1, $adapter->next());
        $this->assertEquals(2, $adapter->next());
        $adapter->next();
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function testFileAdapter() {
        $fd = fopen(__DIR__ . '/test_file', "r");
        $adapter = new FileAdapter($fd);
        $this->assertEquals(1, $adapter->next());
        $this->assertEquals(2, $adapter->next());
        $adapter->reset();
        $this->assertEquals(1, $adapter->next());
        $this->assertEquals(2, $adapter->next());
        $adapter->next();
    }

    public function testGrouper() {
        $this->assertEquals([[0, 1], [2, 3], [4, 5]], iterator_to_array(Grouper::array_grouper(range(0, 5), 2)));
        $this->assertEquals([[0, 1], [2, 3], [4]], iterator_to_array(Grouper::array_grouper(range(0, 4), 2)));
        $this->assertEquals([[0, 1], [2, 3], [4, 0]], iterator_to_array(Grouper::array_grouper(range(0, 4), 2, 0)));
    }
}
