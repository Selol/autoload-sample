<?php
/**
 *       Filename:  Database.php
 *    Description:
 *         Author:  Selol
 *        Created:  十月 24, 下午5:28
 */

namespace MyApp\Config;

class Database
{
    public static function getConnection()
    {
        return 'mysql://root@:127.0.0.1:3306';
    }
}
