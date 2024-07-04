function getCurrentPosition() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            let locationData = {
                latitude: latitude,
                longitude: longitude
            };

            let jsonData = JSON.stringify(locationData);
            console.log(jsonData);

            // Envia os dados para o PHP via AJAX
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: { locationData: jsonData },
                success: function (response) {
                    console.log('Dados enviados com sucesso!');
                    console.log('Resposta do servidor:', response);
                },
                error: function (error) {
                    console.error('Erro ao enviar dados:', error);
                }
            });
        }, function (error) {
            alert('Erro ao obter localização!');
            console.log('Erro ao obter localização.', error);
        });
    } else {
        console.log('Navegador não suporta Geolocalização!');
    }
}
