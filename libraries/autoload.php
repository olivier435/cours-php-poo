<?php

spl_autoload_register(function ($className) {
    //classname=Controller\article
    //require = libaraies /controller/article.php
    $className = str_replace('\\', '/', $className);
    require_once("libraries/$className.php");
});
