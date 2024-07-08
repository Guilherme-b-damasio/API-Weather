<?php require_once '../src/model/Weather.php'; ?>

<div class="container">
    <form class="form-floating" action="index.php" method="post">
        <div class="search-box">
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city name">
            <button class="search-btn" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button class="search-btn" type="button" onclick="getCurrentPosition1()">
                <i class="fa-solid fa-location-crosshairs"></i>
            </button>
        </div>
    </form>


    <?php
    if (isset($_SESSION['weather'])) :
        $weather = unserialize($_SESSION['weather']);
    ?>
        <div class="icon-container">
            <i class="wi <?= $weather->getIconClass() ?>"></i>
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
    <?php endif ?>
</div>

</div>