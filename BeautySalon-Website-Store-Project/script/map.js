const map = L.map('map'); // Init map

map.setView([41.1618782,-8.6068979], 18, "Altair" ),

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ 
maxZoom: 17,
attribution: '© <a></a>'
}).addTo(map); 
// Define a fonte de dados do mapa e associa com o mapa 

let marker, circle, zoomed;
navigator.geolocation.watchPosition(success, error); 

function success(pos) {

    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;

        if (marker) {
            map.removeLayer(marker);
            map.removeLayer(circle);
        }
// Remove qualquer marcador e círculo existentes (novos prestes a serem definidos)

marker = L.marker([41.1618782,-8.6068978], 18).addTo(map);
circle = L.circle([41.1618782,-8.6068979], { radius: accuracy,}).addTo(map);
// Adiciona marcador ao mapa e um círculo para precisão

        if (!zoomed) {
            zoomed = map.fitBounds(circle.getBounds()); 
        }
// Defina o zoom para os limites do círculo de precisão

   // map.setView([lat, lng]);
   // marker = L.marker([lat, lng],).addTo(map);
   // Definir o foco do mapa para a posição atual do usuário
}

function error(err) {
    if (err.code === 1) {
        alert("Please allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
}

