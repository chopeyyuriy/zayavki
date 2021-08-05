<?php

use Project\Write;
use \LeadGenerator\Generator;

require_once __DIR__ . '/../vendor/autoload.php';

$category = 'Pizza';
$generator = new Generator();

Write::writeOrders($generator, $category);



