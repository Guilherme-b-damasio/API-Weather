<?php

namespace Src\Controller;

use Src\Model\Service\serviceAPI;

require_once '../model/service/serviceAPI.php';

class getAPIController
{
    private $service;

    public function __construct(serviceAPI $service)
    {
        $this->service = $service;
    }

    public function handle()
    {
        if (!isset($_POST['city'])) {
            echo "error";
        }

        $city = $_POST['city'];
        $this->service->fetchWeatherData($city);
    }
}

?>