<?php

require __DIR__ . '/vendor/autoload.php';

use Xofttion\Database\Sql\Clauses\Filters\IsNotNull as Filter;

$values = [2, 4, 6];

$filter = Filter::create('documento');

var_dump($filter->build());
