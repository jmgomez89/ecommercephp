<?php

function controllers_autoload($className){

    include 'controllers/' . $className . '_controller.php';

}

spl_autoload_register('controllers_autoload');

