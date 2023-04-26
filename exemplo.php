<?php

require_once 'vendor/autoload.php';

use \Crellan\DigitalCep\Search;

$busca = new Search;

$resultado = $busca->getAddresFromZipCode('000-000');

print_r($resultado);