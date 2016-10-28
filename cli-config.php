<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/28
 * Time: 19:50
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
