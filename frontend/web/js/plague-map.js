
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 徐云凯 1713667
 * This is the main control unit of plague-map
 */

$(document).ready(function () {
    var mymap = L.map('plague-map').setView([25, 155], 2);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/light-v9',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    $.ajax({
        url: "/COVID-19/frontend/web/covid/covid-info",
        type: "GET",
        data: { type: 'latest' },
        async: false,
        dataType: 'json',
        error: function (request) {
            alert("获取疫情数据失败");
        },
        success: function (data) {
            L.geoJson(data, {
                style: style,
            }).addTo(map);
        }
    });
})

// get color depending on population density value
function getColor(d) {
    return d > 10000 ? '#800026' :
        d > 5000 ? '#BD0026' :
            d > 1000 ? '#E31A1C' :
                d > 500 ? '#FC4E2A' :
                    d > 200 ? '#FD8D3C' :
                        d > 50 ? '#FEB24C' :
                            d > 10 ? '#FED976' :
                                '#FFEDA0';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.num.con)
    };
}

// $(document).ready(function () {

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


//     var popup = L.popup();

//     function onMapClick(e) {
//         popup
//             .setLatLng(e.latlng)
//             .setContent(e.latlng.toString())
//             .openOn(mymap);
//     }

//     mymap.on('click', onMapClick);
// });
