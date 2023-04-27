<?php

namespace Crellan\DigitalCep;


class Search
{
    private $urlViaCep = "https://viacep.com.br/ws/";
    private $urlWideNet = "https://cdn.apicep.com/file/apicep/";

    public function removeHyphen($zipCode): string
    {
        $zipCodeFiltred = preg_replace('/[^0-9]/im', '', $zipCode);

        return $zipCodeFiltred;
    }

    public function addHyphen($zipCode): string
    {
        $formatedCep = '';
        $zipCodeFiltred = preg_replace('/[^0-9]/im', '', $zipCode);
        if (strlen($zipCodeFiltred) === 8) {
            $formatedCep = substr_replace($zipCodeFiltred, "-", 5, 0);
        } else {
            $formatedCep = $zipCode;
        }
        return $formatedCep;
    }

    public function cepTreatment($zipCode)
    {
    }

    public function getAddresFromZipCode(string $zipCode): array
    {


        if (is_array($get = json_decode(file_get_contents($this->urlViaCep . $this->removeHyphen($zipCode) . "/json"), true))) {
            $data = $get;
        } else if (is_array($get = json_decode(file_get_contents($this->urlWideNet . $this->addHyphen($zipCode) . ".json"), true))) {
            $data = $get;
        }

        return $data;
    }
}


