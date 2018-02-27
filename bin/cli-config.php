<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 15/02/2018
 * Time: 13:14
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once '../bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);