<?php

use app\Write;
use \LeadGenerator\Generator;

require_once __DIR__ . '/vendor/autoload.php';

$category = 'Pizza';
$generator = new Generator();

Write::writeOrders($generator, $category);

echo 'Заявки обработанные и сохранены в файл log.txt';
