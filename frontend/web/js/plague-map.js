$(document).ready(function () {

    // var normalMap = L.tileLayer.chinaProvider('Google.Normal.Map', {
    //     maxZoom: 18,
    //     minZoom: 1,
    //     id: 'google/light-v9'
    // });
    // var satelliteMap = L.tileLayer.chinaProvider('Google.Satellite.Map', {
    //     maxZoom: 18,
    //     minZoom: 1
    // });
    // var routeMap = L.tileLayer.chinaProvider('Google.Satellite.Annotion', {
    //     maxZoom: 18,
    //     minZoom: 1
    // });

    // var baseLayers = {
    //     "普通地图": normalMap,
    //     "卫星地图": satelliteMap,
    //     "标注": routeMap
    // }

    // var overlayLayers = {

    // }

    var mymap = L.map("plague-map", {
        layers: [normalMap]
    }).setView([25, 150], 2);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/light-v9',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    // L.control.layers(baseLayers, overlayLayers).addTo(map);

    // L.control.zoom({
    //     zoomInTitle: '放大',
    //     zoomOutTitle: '缩小'
    // }).addTo(map);

    // L.marker([51.5, -0.09]).addTo(mymap)
    //     .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

    // L.circle([51.508, -0.11], 500, {
    //     color: 'red',
    //     fillColor: '#f03',
    //     fillOpacity: 0.5
    // }).addTo(mymap).bindPopup("I am a circle.");

    // L.polygon([
    //     [51.509, -0.08],
    //     [51.503, -0.06],
    //     [51.51, -0.047]
    // ]).addTo(mymap).bindPopup("I am a polygon.");


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);
});
