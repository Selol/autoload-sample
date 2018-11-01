<?php
/**
 *       Filename:  ConfigServiceTest.php
 *    Description:
 *         Author:  licong11@baidu.com
 *        Created:  十月 29, 下午4:01
 *       Copyright (c) 2018, Baidu.com All Rights Reserved
 */


use PHPUnit\Framework\TestCase;
use MyApp\Config\Service;

class ConfigServiceTest extends TestCase
{
    public function testGetProjectName()
    {
        $this->assertEquals('MyProject', Service::getProjectName());
    }
}
