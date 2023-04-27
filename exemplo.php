<?php

require_once 'vendor/autoload.php';

use \Crellan\DigitalCep\Search;

$busca = new Search;

$resultado = $busca->getAddresFromZipCode('03021‑020');

print_r($resultado);