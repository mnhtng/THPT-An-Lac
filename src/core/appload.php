<?php
defined('APP_PATH') or exit('Do not have access to this section!');

// Include database interactive function
require LIB_PATH . DIRECTORY_SEPARATOR . 'database.php';

// Include core base function
require CORE_PATH . DIRECTORY_SEPARATOR . 'base.php';

// Include config file
require CONFIG_PATH . DIRECTORY_SEPARATOR . 'database.php';
require CONFIG_PATH . DIRECTORY_SEPARATOR . 'config.php';
require CONFIG_PATH . DIRECTORY_SEPARATOR . 'autoload.php';


if (is_array($autoload)) {
    foreach ($autoload as $type => $list_auto) {
        if (!empty($list_auto)) {
            foreach ($list_auto as $name)
                load($type, $name);
        }
    }
}

// Connect database and load data to session variable
db_connect($db);

require CORE_PATH . DIRECTORY_SEPARATOR . 'router.php';
