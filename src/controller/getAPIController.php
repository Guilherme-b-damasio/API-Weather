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
        if (!isset($_POST['city'])) {
            echo "error";
        }

        $city = $_POST['city'];
        $this->service->fetchWeatherData($city);
    }
}

?>