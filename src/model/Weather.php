<?php

namespace Src\Model\Entity;

class Weather
{
    private $city;
    private $temp;
    private $humidity;
    private $speedWind;
    private $icon;
    private $description;
    private $iconClass;

    public function __construct($weatherData)
    {
        $this->city = $weatherData->name;
        $this->temp = $weatherData->main->temp;
        $this->humidity = $weatherData->main->humidity;
        $this->speedWind = $weatherData->wind->speed;
        $this->icon = $weatherData->weather[0]->icon;
        $this->description = $weatherData->weather[0]->description;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getTemp()
    {
        return $this->temp;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getSpeedWind()
    {
        return $this->speedWind;
    }
    public function getIcon()
    {
        return $this->icon;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIconClass()
    {
        return $this->iconClass;
    }

    public function setIconClass($iconClass)
    {
        $this->iconClass = $iconClass;
    }
}
