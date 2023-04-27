<?php

use PHPUnit\Framework\TestCase;
use \Crellan\DigitalCep\Search;

class SearchTest extends TestCase
{


    /**
     * @dataProvider dataTest
     */
    public function testGetAddresFromZipCodeDefaultUsage(string $input, array $esperado)
    {
        $resultado = new Search();

        $resultado = $resultado->getAddresFromZipCode($input);

        $this->assertEquals($esperado, $resultado);
    }

    public static function dataTest()
    {
        return [
            "Endereco Praca Se" => [
                "01001000", [
                    "cep" => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "ibge" => "3550308",
                    "gia" => "1004",
                    "ddd" => "11",
                    "siafi" => "7107"]
            ]

        ];
    }


    public function testRemoveHyphen()
    {
        $search = new Search();
        $result = $search->removeHyphen("88888-888");
        $this->assertEquals(8, strlen($result));
    }

    public function testAddHyphen()
    {
        $search = new Search();
        $result = $search->addHyphen("88888-888");
        $this->assertEquals(9, strlen($result));
    }
}