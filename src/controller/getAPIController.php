<?php

namespace Src\Controller;

use Src\Model\Service\serviceAPI;

require_once '../src/model/service/serviceAPI.php';

class getAPIController
{
    private $service;

    public function serviceGet()
    {
        return new serviceAPI;
    }

    public function handle()
    {
        $this->service = $this->serviceGet();
        if (!isset($_REQUEST['city']) || !isset($_REQUEST['locationData'])) {
            header("Location: index.php");
        }

        $parametro = isset($_REQUEST['city']) ? $_REQUEST['city'] : $_REQUEST['locationData'];

        if ($_REQUEST['city']) {
            $this->service->fetchWeatherDataByCity($parametro);
        }

        $this->service->fetchWeatherData($parametro);
    }
}
