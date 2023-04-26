<?php

namespace Crellan\DigitalCep;


class Search
{
    private $urlViaCep = "https://viacep.com.br/ws/";
    private $urlWideNet = "https://cdn.apicep.com/file/apicep/";

    public function getAddresFromZipCode(string $zipCode): array
    {

        $zipCodeFiltred = preg_replace('/[^0-9]/im', '', $zipCode);


        if (is_array($get = json_decode(file_get_contents($this->urlViaCep . $zipCodeFiltred . "/json"), true))) {
            $data = $get;
        } else if (is_array($get = json_decode(file_get_contents($this->urlWideNet . $zipCode . ".json"), true))) {
            $data = $get;
        }

        return $get;
    }
}


