<?php

require_once 'vendor/autoload.php';

use \Crellan\DigitalCep\Search;

$busca = new Search;

$resultado = $busca->getAddresFromZipCode('0101010101');

print_r($resultado);