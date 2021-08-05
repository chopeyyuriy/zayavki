<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Project\Asynchron;

$script = [
    __DIR__ . '/AsynchronWrite.php'
];

$callbackFunction = function (){
    echo '#FINISHED: Заявки обработанные и сохранены в файл log.txt ';
};

new Asynchron($script, $callbackFunction);