<?php

namespace Src\Controller;

use Src\Model\Service\serviceAPI;

require_once '../src/model/service/serviceAPI.php';

class getAPIController
{
    private $service;

    public function serviceGet(){
        return new serviceAPI;
    }

    public function handle()
    {
        $this->service = $this->serviceGet();
        if (!isset($_REQUEST['city']) || !isset($_REQUEST['locationData'])) {
            echo "error";
        }

        $parametro = isset($_REQUEST['city']) ? $_REQUEST['city'] : $_REQUEST['locationData'];
        $parametro = $_REQUEST['locationData'];
        $_SESSION['teste'] =  $_REQUEST['locationData'] ? $parametro : "não foi";

        $this->service->fetchWeatherData($parametro);
    }
}

?>