<?php
/**
 *       Filename:  index.php
 *    Description:  entrance file
 *         Author:  Selol
 *        Created:  十月 25, 上午10:22
 */

require_once __DIR__ . '/vendor/autoload.php';

// autoload class
use MyCompany\MyApp\Config\Service;
echo Service::getProjectName();

// autoload function
echo value(function () {
    return 'works';
});




