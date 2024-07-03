<?php
require_once '../src/model/Weather.php';

if (isset($_SESSION['weather'])) {
    $weather = unserialize($_SESSION['weather']);
}
?>

<div class="container">
    <form class="form-floating" action="index.php" method="POST">
        <div class="search-box">
            <input type="text" class="form-control" id="city" name="city">
            <label for="city"></label>
            <button class="search-btn" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>

    <div class="icon-container">
        <img src=<?php echo "https://openweathermap.org/img/wn/" .  $weather->getIcon() . ".png" ?> alt="weather icon"
            class="icon">
    </div>

    <h1 class="temperature"><?php echo $weather->getTemp() ?></h1>

    <h2 class="city-name"><?php echo $weather->getCity() ?></h2>

    <div class="secondary-info">
        <div>
            <i class="fa-solid fa-water"></i>
            <div>
                <p class="humidity"><?php echo $weather->getHumidity() ?></p>
                <p>Humidade</p>
            </div>
        </div>

        <div>
            <i class="fa-solid fa-wind"></i>
            <div>
                <p class="wind"><?php echo $weather->getSpeedWind() ?></p>
                <p>Velocidade do Vento</p>
            </div>
        </div>
    </div>
</div>

</div>