<?php

namespace Src\Model\Service;
require_once '../model/Weather.php';
use Src\Model\Entity\Weather;

class serviceAPI
{
    public function fetchWeatherData($city)
    {
        $apiKey = getenv('API_KEY');
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