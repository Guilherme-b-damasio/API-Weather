<?php

namespace Src\Model\Service;
require_once '../model/Weather.php';
use Src\Model\Entity\Weather;

class serviceAPI
{
    public function fetchWeatherData($city)
    {
        $apiKey = '8807b0c1b453555da2b8c1c5e2602e81';
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

        $weatherData = json_decode(file_get_contents($apiUrl));

        if ($weatherData) {
            $weather = new Weather($weatherData);
            $_SESSION['weather'] = serialize($weather);
        } else {
            $_SESSION['msg'] = "Failed to fetch weather data.";
        }
        header("Location: ../../public/index.php");
        exit;
    }
}
?>