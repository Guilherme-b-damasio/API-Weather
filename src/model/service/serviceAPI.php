<?php

namespace Src\Model\Service;

require_once '../src/model/Weather.php';

use Src\Model\Entity\Weather;

class serviceAPI
{
    public function fetchWeatherData($parametro)
    {
        $apiKey = "a48b68af73c54ddf1190f87977b8d8ed";

        $locationData = json_decode($parametro);
        $apiUrl = $apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=" . urlencode($locationData->latitude) . "&lon=" . urlencode($locationData->longitude) . "&appid=" . urlencode($apiKey) . "&units=metric";

        $weatherData = json_decode(file_get_contents($apiUrl));

        if ($weatherData) {
            $weather = new Weather($weatherData);
            $this->setImageIcon($weather);
            $_SESSION['weather'] = serialize($weather);
        } else {
            echo $_SESSION['msg'] = "Failed to fetch weather data.";
        }
        exit;
    }

    public function fetchWeatherDataByCity($parametro)
    {
        $apiKey = "a48b68af73c54ddf1190f87977b8d8ed";
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$parametro&appid=$apiKey&units=metric";

        $weatherData = json_decode(file_get_contents($apiUrl));

        if ($weatherData) {
            $weather = new Weather($weatherData);
            $this->setImageIcon($weather);
            $_SESSION['weather'] = serialize($weather);
        } else {
            echo $_SESSION['msg'] = "Failed to fetch weather data.";
        }
        exit;
    }

    public function setImageIcon($weather)
    {
        $iconCode = $weather->getIcon();
        echo $iconCode;
        $iconMap = [
            '01d' => 'wi-day-sunny',
            '01n' => 'wi-night-clear',
            '02d' => 'wi-day-cloudy',
            '02n' => 'wi-night-alt-cloudy',
            '03d' => 'wi-cloud',
            '03n' => 'wi-cloud',
            '04d' => 'wi-cloudy',
            '04n' => 'wi-cloudy',
            '09d' => 'wi-day-showers',
            '09n' => 'wi-night-alt-showers',
            '10d' => 'wi-day-rain',
            '10n' => 'wi-night-alt-rain',
            '11d' => 'wi-day-thunderstorm',
            '11n' => 'wi-night-alt-thunderstorm',
            '13d' => 'wi-day-snow',
            '13n' => 'wi-night-alt-snow',
            '50d' => 'wi-day-fog',
            '50n' => 'wi-night-fog'
        ];

        if (array_key_exists($iconCode, $iconMap)) {
            $iconClass = $iconMap[$iconCode];
        } else {
            $iconClass = 'wi-na';
        }

        $weather->setIconClass($iconClass);
    }
}
