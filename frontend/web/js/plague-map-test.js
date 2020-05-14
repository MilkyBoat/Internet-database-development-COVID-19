///////////////////////////////accessary//////////////////////////////////

$(window).ready(function () {
    $('.loader').fadeOut("slow");
});


var d3locale = d3.formatDefaultLocale({
    "thousands": ",",
    "grouping": [3],
});

L.TopoJSON = L.GeoJSON.extend({
    addData: function (jsonData) {
        if (jsonData.type === 'Topology') {
            for (key in jsonData.objects) {
                geojson = topojson.feature(jsonData, jsonData.objects[key]);
                L.GeoJSON.prototype.addData.call(this, geojson);
            }
        } else {
            L.GeoJSON.prototype.addData.call(this, jsonData);
        }
    }
});
// Copyright (c) 2013 Ryan Clark

// var createLabelIcon = function(labelClass, labelText) {
//   return L.divIcon({
//     className: labelClass,
//     html: labelText
//   })
// }
//


var worldBounds = L.latLngBounds(
    L.latLng(-60, -100), //Southwest
    L.latLng(80, 15) //Northeast
);



//return the totalConfirmed number of given country
function tc(country) {
    if (country == undefined) {
        country = 0
    } else {
        country = +country.split("-")[0];
    }
    return country;
}

//return the totalRecovered number of given country
function tr(country) {
    if (country.split("-")[2] == undefined) {
        country = 0
    } else {
        country = +country.split("-")[2];
    }
    return country;
}

//return the totalDeath number of given country
function td(country) {
    if (country.split("-")[3] == undefined) {
        country = 0
    } else {
        country = +country.split("-")[3];
    }
    return country;
}

//////////////////////////////////////////////////////////////////////////




//create the base map and set the initial view point
var mymap = L.map('plague-map', {
    center: [38, -120],
    zoomControl: false,
    zoom: 4,
    maxZoom: 10,
    minZoom: 2,
    worldCopyJump: true
}).fitBounds(worldBounds);
// .fitWorld()
new L.Control.Zoom({
    position: 'topright'
}).addTo(mymap);



var gray = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}@2x.png');
// var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}@2x.png').addTo(mymap);
var voyager =
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}@2x.png').addTo(mymap);
var satellite =
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');

var baseLayers = {
    'CARTO Light': gray,
    // 'Dark': dark,
    'CARTO Voyager': voyager,
    'ESRI Satellite': satellite
}



var chart, rchart;

//create colot scale for both region and legend,and insert the "style" into the "head" tag
var colors = chroma.scale('YlOrRd').mode('lch').colors(6);
for (i = 0; i < 6; i++) {
    $('head').append($("<style> .region-color-" + (i + 1).toString() + " { color: " + colors[i] + "; font-size: 15px; text-shadow: 0 0 3px #ffffff;} </style>"));
    $('head').append($("<style> .legend-color-" + (i + 1).toString() + " { background: " + colors[i] + "; font-size: 15px; text-shadow: 0 0 3px #ffffff;} </style>"));
}

//create communities object that can add community icon to the map through leaflet
//chinese cases
var communities = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: false,
    singleMarkerMode: true,
    // showCoverageOnHover: false,
    // zoomToBoundsOnClick: false,
    iconCreateFunction: function (cluster) {
        return L.divIcon({
            // html: '<i class="fas fa-procedures community community-marker"> <b>' + cluster.getChildCount() + '</b></i>'
            html: '<i class="fas fa-procedures community community-marker"> <b>' + cluster.getChildCount() + '</b></i>'
        });
    }

});

//create cases object that can add community icon to the map through leaflet, the size of the icon is based on the number of cases in that area
// <20 cases return small size icon, >20 & <100 ruturn large size, >100 return 2x size
//for america and canada cases
var cases = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: true,
    singleMarkerMode: true,
    polygonOptions: {
        fillColor: "red",
        color: 'red',
        weight: 0.5,
        opacity: 0.6,
        fillOpacity: 0.2
    },
    showCoverageOnHover: true,
    // zoomToBoundsOnClick: false,
    iconCreateFunction: function (cluster) {
        cnt = cluster.getChildCount()

        if (cnt >= 100) {
            return L.divIcon({
                // html: '<i class="fas fa-users community community-marker"> <b>' + cluster.getChildCount() + '</b></i>'
                html: '<i class="fas fa-users community community-marker fa-2x "> <b>' + "" + '</b></i>'
            });
        } else if (cnt >= 20 && cnt < 100) {
            return L.divIcon({
                // html: '<i class="fas fa-users community community-marker"> <b>' + cluster.getChildCount() + '</b></i>'
                html: '<i class="fas fa-users community community-marker fa-lg "> <b>' + "" + '</b></i>'
            });

        } else {
            return L.divIcon({
                // html: '<i class="fas fa-users community community-marker"> <b>' + cluster.getChildCount() + '</b></i>'
                html: '<i class="fas fa-users community community-marker fa-sm "> <b>' + "" + '</b></i>'
            });
        }
    }

}).addTo(mymap);


//load all datasets through d3 and store them in an array
Promise.all([
    d3.csv('assets/virus.csv'), //datasets[0]
    d3.json("assets/all-topo-15.json"), //datasets[1]
    //d3.csv('assets/communities.csv'), //chinese cases
    d3.csv('assets/timestamp.txt'), //datasets[3]
    d3.csv('assets/cases.csv'), //America cases
    d3.csv('assets/united-states.txt'), //datasets[5]
    d3.csv('assets/canada-city.txt'), //datasets[6]
    d3.csv('assets/old-name.csv'), //datasets[7] chinese provinces
    d3.csv('assets/cases-canada.csv') //datasets[8]
]).then(function (datasets) {

    //read the timestamp in timestamp.txt and add it to map
    $("#date").text(datasets[2][0].timestamp.split(".")[0] + " PST");

    //read data from communities.csv and add each case on to the map with given information
    //cases in china
    //datasets[2].forEach(function(d) {
    //  L.marker([parseFloat(d.lat), parseFloat(d.lng)]).bindPopup(d.name + "&nbsp;&nbsp;(<a target='_blank' href='https://translate.google.com/#view=home&op=translate&sl=zh-CN&tl=en&text=" + d.name + "'>Translate to English</a>)").addTo(
    //    communities);
    //})

    //read data from cases.csv and add each case on to the map with given information
    //cases in America
    datasets[3].forEach(function (d) {
        //console.log(d.id)
        L.marker([parseFloat(d.lat), parseFloat(d.lng)]).bindPopup("<b>" + d.no + "</b> <p>" + d.note + " identified on " + d.date + ", &nbsp;<a href='https://" + d.reference + "' target='_blank'>" + d.reference + "</a>.</p>").addTo(
            cases);
    })

    //cases in Canada
    datasets[7].forEach(function (d) {
        //console.log(d.id)
        L.marker([parseFloat(d.lat), parseFloat(d.lng)]).bindPopup("<b>" + d.no + "</b> <p>" + d.note + " identified on " + d.date + ", &nbsp;<a href='https://" + d.reference + "' target='_blank'>" + d.reference + "</a>.</p>").addTo(
            cases);
    })

    var latest = datasets[0][datasets[0].length - 1];
    //delete latest["datetime"];

    //get latest data for every country/city
    var top = {},
        ustop = {},
        cntop = {};
    top["china"] = 0;
    //this fucntion read the latest data from virus.csv and write the country name and it's latest active confirmed value into dictionary
    Object.keys(latest).forEach(function (d) {
        value = tc(datasets[0][datasets[0].length - 1][d]) - tr(datasets[0][datasets[0].length - 1][d]) - td(datasets[0][datasets[0].length - 1][d]);
        // value = tc(datasets[0][datasets[0].length - 1][d]);
        if (datasets[6]["columns"].includes(d)) { //china
            // console.log(value);
            // console.log(top["china"]);
            top["china"] += +value;
            cntop[d] = value;

        } else if (datasets[5]["columns"].includes(d)) { //canada
            ;
        } else if (datasets[4]["columns"].includes(d)) { //us
            ustop[d] = value;
        } else if (d != "datetime") { //else
            top[d] = value;
        }

    })

    // this function take a dictionary [country:active confirmed case], return a dictionary that sorted by the number of active confired case
    function sortJsObject(obj) {
        items = Object.keys(obj).map(function (key) {
            return [key, obj[key]];
        });
        items.sort(function (first, second) {
            return second[1] - first[1];
        });
        sorted_obj = {}
        $.each(items, function (k, v) {
            use_key = v[0]
            use_value = v[1]
            sorted_obj[use_key] = use_value
        })
        return (sorted_obj)
    }


    stop = sortJsObject(top); //sort globally
    sustop = sortJsObject(ustop); //sort US states


    var places = {};

    //this function take a string of country/place name and calculate the data for it
    //return place[name] which is a dictonary that has everyday's dataset
    function calPlace(name) {
        var place = {}
        place[name] = {
            't': ['t'], //date
            'c': ['Aggr. Confirmed'],
            's': ['s'],
            'r': ['Recovered'],
            'd': ['Death'],
            'a': ['Active Confirmed']
        }
        // cf = 0, sp = 0, rc = 0, dd = 0, active = 0;
        datasets[0].forEach(function (d) {
            var USTd = new Date(d["datetime"]);

            place[name].t.push(USTd.setHours(USTd.getHours() + 8)); //convert to American time zone

            cf = 0, sp = 0, rc = 0, dd = 0, active = 0;
            current = d;
            delete current["datetime"];

            if (name == "Global Trend") {

                Object.values(current).forEach(function (d) {
                    if (d == undefined) {
                        d = "0"
                    };
                    items = d.split("-");
                    switch (items.length) {
                        case 4:
                            dd += +items[3];
                        case 3:
                            rc += +items[2];
                        case 2:
                            sp += +items[1];
                        case 1:
                            cf += +items[0];
                            break;
                    };
                    active = cf - dd - rc;
                });

                cf -= (tc(current["alabama"]) + tc(current["alaska"]) + tc(current["arizona"]) + tc(current["arkansas"]) + tc(current["california"]) + tc(current["colorado"]) + tc(current["connecticut"]) + tc(current["delaware"]) + tc(current[
                    "florida"]) + tc(current["georgia usa"]) + tc(current["hawaii"]) + tc(current["idaho"]) + tc(current["illinois"]) + tc(current["indiana"]) + tc(current["iowa"]) + tc(current["kansas"]) + tc(current["kentucky"]) + tc(current[
                        "louisiana"]) + tc(current["maine"]) + tc(current["maryland"]) + tc(current["massachusetts"]) + tc(current["michigan"]) + tc(current["minnesota"]) + tc(current["mississippi"]) + tc(current["missouri"]) + tc(current[
                            "montana"]) + tc(
                                current["nebraska"]) + tc(current["nevada"]) + tc(current["new hampshire"]) + tc(current["new jersey"]) + tc(current["new mexico"]) + tc(current["new york"]) + tc(current["north carolina"]) + tc(current["north dakota"]) +
                    tc(current[
                        "ohio"]) + tc(current["oklahoma"]) + tc(current["oregon"]) + tc(current["pennsylvania"]) + tc(current["rhode island"]) + tc(current["south carolina"]) + tc(current["south dakota"]) + tc(current["tennessee"]) + tc(current[
                            "texas"]) +
                    tc(current["utah"]) + tc(current["vermont"]) + tc(current["virginia"]) + tc(current["washington"]) + tc(current["west virginia"]) + tc(current["canada"]));

                rc -= (tr(current["alabama"]) + tr(current["alaska"]) + tr(current["arizona"]) + tr(current["arkansas"]) + tr(current["california"]) + tr(current["colorado"]) + tr(current["connecticut"]) + tr(current["delaware"]) + tr(current[
                    "florida"]) + tr(current["georgia usa"]) + tr(current["hawaii"]) + tr(current["idaho"]) + tr(current["illinois"]) + tr(current["indiana"]) + tr(current["iowa"]) + tr(current["kansas"]) + tr(current["kentucky"]) + tr(current[
                        "louisiana"]) + tr(current["maine"]) + tr(current["maryland"]) + tr(current["massachusetts"]) + tr(current["michigan"]) + tr(current["minnesota"]) + tr(current["mississippi"]) + tr(current["missouri"]) + tr(current[
                            "montana"]) + tc(
                                current["nebraska"]) + tr(current["nevada"]) + tr(current["new hampshire"]) + tr(current["new jersey"]) + tr(current["new mexico"]) + tr(current["new york"]) + tr(current["north carolina"]) + tr(current["north dakota"]) +
                    tr(current[
                        "ohio"]) + tr(current["oklahoma"]) + tr(current["oregon"]) + tr(current["pennsylvania"]) + tr(current["rhode island"]) + tr(current["south carolina"]) + tr(current["south dakota"]) + tr(current["tennessee"]) + tr(current[
                            "texas"]) +
                    tr(current["utah"]) + tr(current["vermont"]) + tr(current["virginia"]) + tr(current["washington"]) + tr(current["west virginia"]) + tr(current["canada"]));

                dd -= (td(current["alabama"]) + td(current["alaska"]) + td(current["arizona"]) + td(current["arkansas"]) + td(current["california"]) + td(current["colorado"]) + td(current["connecticut"]) + td(current["delaware"]) + td(current[
                    "florida"]) + td(current["georgia usa"]) + td(current["hawaii"]) + td(current["idaho"]) + td(current["illinois"]) + td(current["indiana"]) + td(current["iowa"]) + td(current["kansas"]) + td(current["kentucky"]) + td(current[
                        "louisiana"]) + td(current["maine"]) + td(current["maryland"]) + td(current["massachusetts"]) + td(current["michigan"]) + td(current["minnesota"]) + td(current["mississippi"]) + td(current["missouri"]) + td(current[
                            "montana"]) + tc(
                                current["nebraska"]) + td(current["nevada"]) + td(current["new hampshire"]) + td(current["new jersey"]) + td(current["new mexico"]) + td(current["new york"]) + td(current["north carolina"]) + td(current["north dakota"]) +
                    td(current[
                        "ohio"]) + td(current["oklahoma"]) + td(current["oregon"]) + td(current["pennsylvania"]) + td(current["rhode island"]) + td(current["south carolina"]) + td(current["south dakota"]) + td(current["tennessee"]) + td(current[
                            "texas"]) +
                    td(current["utah"]) + td(current["vermont"]) + td(current["virginia"]) + td(current["washington"]) + td(current["west virginia"]) + td(current["canada"]));

            } else if (name == "china") {


                for (const [key, value] of Object.entries(current)) {

                    if (datasets[6]["columns"].includes(key)) {

                        if (value == undefined) {
                            value = "0"
                        };
                        items = value.split("-");
                        switch (items.length) {
                            case 4:
                                dd += +items[3];
                            case 3:
                                rc += +items[2];
                            case 2:
                                sp += +items[1];
                            case 1:
                                cf += +items[0];
                                break;
                        };
                        active = cf - dd - rc;
                    }
                }


            } else {


                d = current[name];
                if (d == undefined) {
                    d = "0"
                };
                items = d.split("-");
                switch (items.length) {
                    case 4:
                        dd += +items[3];
                    case 3:
                        rc += +items[2];
                    case 2:
                        sp += +items[1];
                    case 1:
                        cf += +items[0];
                        break;
                };
                active = cf - dd - rc;

            }
            active = cf - dd - rc;
            place[name].c.push(cf);
            //place[name].s.push(sp);
            place[name].r.push(rc);
            place[name].d.push(dd);
            place[name].a.push(active);

        });

        return place[name];
    }

    //this function take a place name and diaplay the data to the info panel
    function showPlace(name) {

        len = places[name].t.length;
        $(".confirmed-count").text(places[name].c[len - 1].toLocaleString());
        $(".recovered-count").text(places[name].r[len - 1].toLocaleString());
        $(".death-count").text(places[name].d[len - 1].toLocaleString());
        $(".active-count").text(places[name].a[len - 1].toLocaleString());

        nc = places[name].c[len - 1] - places[name].c[len - 2]; //new aggregate confirmed cases of the day
        nr = places[name].r[len - 1] - places[name].r[len - 2]; //new recovered confirmed cases of the day
        nd = places[name].d[len - 1] - places[name].d[len - 2]; //new death of the day
        na = places[name].a[len - 1] - places[name].a[len - 2]; //new active cases of the days

        if (nc > 0) {
            $(".confirmed-new-count").text("+" + nc.toLocaleString());
        } else if (nc == 0) {
            $(".confirmed-new-count").text("");
        } else {
            $(".confirmed-new-count").text(nc.toLocaleString());
        }

        if (nr > 0) {
            $(".recovered-new-count").text("+" + nr.toLocaleString());
        } else if (nr == 0) {
            $(".recovered-new-count").text("")
        } else {
            $(".recovered-new-count").text(nr.toLocaleString());
        }
        if (nd > 0) {
            $(".death-new-count").text("+" + nd.toLocaleString());
        } else if (nd == 0) {
            $(".death-new-count").text("")
        } else {
            $(".death-new-count").text(nd.toLocaleString());
        }


        if (na > 0) { //only display info icon when there's change
            document.getElementById("counticon").style.display = "initial";
            $(".active-new-count").text("+" + na.toLocaleString());
        } else if (na < 0) {
            document.getElementById("counticon").style.display = "initial";
            $(".active-new-count").text("" + na.toLocaleString());
        } else if (na == 0) {
            document.getElementById("counticon").style.display = "none";
            $(".active-new-count").text("")
        } else {
            document.getElementById("counticon").style.display = "none";
            $(".active-new-count").text(na.toLocaleString());
        }

        //add ",CHINA" to every provinces in China
        if (datasets[6]["columns"].includes(name)) { //add ",CHINA" to every provinces in China
            $("#placename").text(name.toUpperCase() + ", CHINA");
            if (name == "taiwan") {
                $("#placename").text("Taiwan");
            }
            if (name == "hongkong") {
                $("#placename").text("Hong Kong");
            }
            if (name == "macau") {
                $("#placename").text("Macau");
            }

        } else {
            $("#placename").text(name.toUpperCase());
        }

        //add reference source for each place
        if (datasets[4]["columns"].includes(name)) {
            $("#source-website").html( //Unisted states
                '<a target="_blank" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/"> WHO</a>, <a target="_blank" href="https://www.cdc.gov/coronavirus/2019-ncov/cases-updates/cases-in-us.html?CDC_AA_refVal=https%3A%2F%2Fwww.cdc.gov%2Fcoronavirus%2F2019-ncov%2Fcases-in-us.html">CDC</a>, <a target="_blank" href="https://www.nytimes.com/interactive/2020/us/coronavirus-us-cases.html">New York Times</a>, and <a target="_blank" href="https://www.nbcnews.com/health/health-news/coronavirus-u-s-map-where-virus-has-been-confirmed-across-n1124546">NBC News</a>.'
            );
        } else if (datasets[5]["columns"].includes(name)) { //Canada
            $("#source-website").html('<a target="_blank" href="https://www.canada.ca/en/public-health/services/diseases/2019-novel-coronavirus-infection.html">Public Health Agency of Canada.</a>');
        } else if (datasets[6]["columns"].includes(name)) { //China
            $("#source-website").html(
                '<a target="_blank" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/"> WHO</a>, <a target="_blank" href="http://www.nhc.gov.cn/xcs/xxgzbd/gzbd_index.shtml">China CDC</a>, and <a target="_blank" href="https://voice.baidu.com/act/newpneumonia/newpneumonia">Baidu</a>.'
            );
        } else if (name == "Global Trend") { //global
            $("#source-website").html(
                '<a target="_blank" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/"> WHO</a>, <a target="_blank" href="https://www.nytimes.com/interactive/2020/us/coronavirus-us-cases.html">New York Times</a>, <a target="_blank" href="https://www.nbcnews.com/health/health-news/coronavirus-u-s-map-where-virus-has-been-confirmed-across-n1124546">NBC News</a>, <a target="_blank" href="https://www.cdc.gov/coronavirus/2019-ncov/cases-updates/cases-in-us.html?CDC_AA_refVal=https%3A%2F%2Fwww.cdc.gov%2Fcoronavirus%2F2019-ncov%2Fcases-in-us.html">CDC</a>, <a target="_blank" href="https://voice.baidu.com/act/newpneumonia/newpneumonia">Baidu</a>, <a target="_blank" href="https://en.wikipedia.org/wiki/2019%E2%80%9320_coronavirus_pandemic">Wikipedia</a>, and etc.'
            );
        } else if (name == "japan") { //japan
            $("#source-website").html(
                '<a target="_blank" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/"> WHO</a>, <a target="_blank" href="https://en.wikipedia.org/wiki/2019%E2%80%9320_coronavirus_pandemic">Wikipedia</a>, and <a target="_blank" href="https://voice.baidu.com/act/newpneumonia/newpneumonia">Baidu</a>. The discrepancy on the data in Japan between March 11th and March 12th comes from the disagreement of whether to include cases from the Princess Diamond cruise.'
            );
        } else { //Other countries
            $("#source-website").html(
                '<a target="_blank" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/situation-reports/"> WHO</a>, <a target="_blank" href="https://en.wikipedia.org/wiki/2019%E2%80%9320_coronavirus_pandemic">Wikipedia</a>, and <a target="_blank" href="https://voice.baidu.com/act/newpneumonia/newpneumonia">Baidu</a>.'
            );
        }
    }

    //this funciton take a place name and check the status of that place, then fill the background based on its status
    //grey slash for non-case country, zero aggregate confirmed case
    //green slash for country that had cases before but now has zero active confirmed case
    //other countries remain blank background
    function setFill(enname) {
        var pop = datasets[0][datasets[0].length - 1][enname];
        if (pop == "" || pop == undefined || pop.toString().split("-")[0] == "0") {
            return 'url(img/texture-s.png)';
        } else {
            pop = +pop.toString().split("-")[0] - +pop.toString().split("-")[2] - +pop.toString().split("-")[3];
            // return "#00000000";
        }
        if (pop == 0) {
            return 'url(img/texture-sg.png)';
            // return 'url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPScxMCcgaGVpZ2h0PScxMCc+CiAgPHJlY3Qgd2lkdGg9JzEwJyBoZWlnaHQ9JzEwJyBmaWxsPSd3aGl0ZScgLz4KICA8cmVjdCB4PScwJyB5PScwJyB3aWR0aD0nMScgaGVpZ2h0PScxJyBmaWxsPSdibGFjaycgLz4KPC9zdmc+")';
        } else {
            return 'url()';
        }


    }

    //this function take a place name, return a color that fills the place area on the maps
    //the color is based on the number of active confirmed case
    function setColor(enname) {
        var id = 0;
        var pop = datasets[0][datasets[0].length - 1][enname];

        if (pop != undefined) {
            pop = +pop.toString().split("-")[0] - +pop.toString().split("-")[2] - +pop.toString().split("-")[3]; // remaining confirmed
        } else {
            pop = 0;
            // return "#00000000";
        }

        if (pop >= 50000) {
            id = 5;
        } else if (pop > 10000 && pop <= 50000) {
            id = 4;
        } else if (pop > 5000 && pop <= 10000) {
            id = 3;
        } else if (pop > 1000 && pop <= 5000) {
            id = 2;
        } else if (pop > 100 && pop <= 1000) {
            id = 1;
        } else if (pop > 0 && pop <= 100) {
            id = 0;
        } else {
            id = -1;
            return "#00000000";
        }

        return colors[id];

    }

    //this function takes a place's name, set the color background and opacitiy for the place area on the map
    function style(feature) {
        if (feature.properties.enname == "us" || feature.properties.enname == "canada") {
            return {
                fillOpacity: 0,
                opacity: 0,
            };
        } else {
            return {
                fill: setFill(feature.properties.enname),
                fillColor: setColor(feature.properties.enname),
                fillOpacity: 0.4,
                weight: 0.5,
                opacity: 1,
                color: '#b4b4b4',
                dashArray: '2'
            };
        }
    }


    //this function works when there's a click on the map
    //will highlight the layer that the mouse clicked
    function highlightFeature(e) {
        // e indicates the current event
        var layer = e.target; //the target capture the object which the event associates with
        layer.setStyle({
            weight: 2,
            opacity: 0.8,
            color: '#e3e3e3',
            fillColor: '#00ffd9',
            fillOpacity: 0.1
        });
        // bring the layer to the front.
        layer.bringToFront();
        if (e.target.feature.properties.enname == "us" || e.target.feature.properties.enname == "canada") {
            layer.bringToBack();
        }
    }

    // 3.2.2 zoom to the highlighted feature when the mouse is clicking onto it.
    function zoomToFeature(e) {
        // mymap.fitBounds(e.target.getBounds());
        L.DomEvent.stopPropagation(e);
        $("#hint").text("Click here to the global trend.");
        displayPlace(e.target.feature.properties.enname)
    }

    // 3.2.3 reset the hightlighted feature when the mouse is out of its region.
    function resetHighlight(e) {
        areas.resetStyle(e.target);

    }

    // 3.3 add these event the layer obejct.
    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            click: zoomToFeature,
            mouseout: resetHighlight
        });
    }

    var areas = new L.TopoJSON(datasets[1], {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(mymap);

    //add the control panel at the topright corner of the maps
    //control the display of infection level, cases and commnities icon
    new L.control.layers(baseLayers, {
        "Infection Level": areas,
        "Infection Case(s) &nbsp;&nbsp; <i class='fas fa-users' style='color: #dc3545;'></i>": cases
        //"Infected Community &nbsp;&nbsp; <i class='fas fa-procedures' style='color: #dc3545;'></i>": communities
    }, {
            collapsed: false
        }).addTo(mymap);

    //when click on the tag with "hint" class, the info panel will display global information
    $("#hint").on("click", function () {
        places["Global Trend"] = calPlace("Global Trend");
        showPlace("Global Trend");
        // calCounts(global);
        chart.load({
            columns: [places["Global Trend"].c, places["Global Trend"].d],
            unload: ['Aggr. Confirmed', 'Death'],
        });

        $("#hint").text("Click a place to review local trend.");

    });

    mymap.on('click', onMapClick);


    function onMapClick(e) {
        $("#hint").click();
    }


    places["Global Trend"] = calPlace("Global Trend");
    showPlace("Global Trend");

    //this set the style for the linechart displayed in info panel
    chart = c3.generate({
        size: {
            height: 350,
            width: 460
        },
        data: {
            x: "t",
            y: "confirmed",
            columns: [places["Global Trend"].t, places["Global Trend"].c, places["Global Trend"].d],
            type: 'line',
            axes: {
                confirmed: 'y'
            },
            colors: {
                'Aggr. Confirmed': '#dc3545',
                // Suspected: 'orange',
                //'Active Confirmed': 'orange',
                //'Recovered': '#28a745',
                'Death': 'SlateBlue'
            }
        },
        zoom: {
            enabled: true,
            type: "scroll"
        },
        axis: {
            x: {
                type: "timeseries",
                tick: {
                    format: "%b %d",
                    centered: true,
                    fit: true,
                    count: 8
                }
            },
            y: {
                label: {
                    text: 'Cases',
                    position: 'outer-middle'
                },
                min: 0,
                padding: {
                    bottom: 0
                },
                tick: {
                    format: d3locale.format(",")
                },
                type: 'linear'
            }
        },
        point: {
            r: 3,
            focus: {
                expand: {
                    r: 5
                }
            }
        },
        tooltip: {
            linked: true,
        },
        legend: {
            position: 'inset',
            inset: {
                anchor: "top-left",
                y: 0,
                step: 20
            },
        },
        bindto: "#total-chart"
    });

    // var firstLegend = $(".c3-legend-item");
    // var legendCon = $(firstLegend.node().parentNode);
    // var legendY = parseInt(firstLegend.select('text').attr('y'));
    // legendCon
    //   .append('text')
    //   .text('toggle on/off the curve or scroll on the curves to change the date range')
    //   .attr('y', legendY - 20);

    // var firstLegend = d3.select(".c3-legend-item");
    // var legendCon = d3.select(firstLegend.node().parentNode);
    // var legendY = parseInt(firstLegend.select('text').attr('y'));
    // legendCon
    //   .append('text')
    //   .text('toggle on/off the curve or scroll on the curves to change the date range')
    //   .attr('y', legendY - 20);

    //this funtion take a place's name and load the linechart with that place's data
    function displayPlace(name) {

        places[name] = calPlace(name);
        showPlace(name);

        chart.load({
            columns: [places[name].c, places[name].d],
            unload: ['Aggr. Confirmed', 'Death'],
        });

    }

    //this function generate the situational-heatmap table
    function makeTable() {

        var topinuse = {};
        if (document.getElementById('areaSwitcher').checked != false) {
            topinuse = sustop;
        } else {
            topinuse = stop;
        }

        //create rows for each country/state
        Object.keys(topinuse).slice(0, 52).forEach(function (d) {
            if (d.toUpperCase() == "DIAMOND PRINCESS") {
                return;
            }
            var dlabel = d.toUpperCase();
            if (d.toUpperCase() == "GEORGIA USA") {
                dlabel = "GEORGIA";
            }
            $("tbody").append("<tr id='" + d.replace(" ", "") + "-row'><th style='text-align:right;cursor: pointer; width:350px !important'>" + dlabel + "</th></tr>");
            places[d] = calPlace(d);

            //aggregate confirm column
            $("tr#" + d.replace(" ", "") + "-row").append('<th style="text-align:right"><i class="cell-' + d.replace(" ", "") + '-aggre-confirmed">' + places[d].c[len - 1].toLocaleString() + '</i></th>');


            $("tr#" + d.replace(" ", "") + "-row").append('<th ><i class="cell-' + d.replace(" ", "") + '">' + "" + '</i></th>');


            var a = [];
            for (var i = len - showLen; i < len; i++) {
                a.push(places[d].a[i]);
            }

            $("." + 'cell-' + d.replace(" ", "")).sparkline(a, {
                type: 'line',
                lineColor: '#bf0000',
                fillColor: '#ffd4aa',
                disableTooltips: true
            });


            //place blocks into each cell based on the that day's data
            for (var i = len - showLen - 1; i < len; i++) {
                // a.push(places[d].a[i]);
                //$("tr#" + d.replace(" ", "") + "-row").append('<th scope="col"><i class="cell">' + places[d].c[i] + '</i></th>');
                $("tr#" + d.replace(" ", "") + "-row").append('<th ><i class="cell cell-' + d.replace(" ", "") + '-' + i.toString() + '">' + "" + '</i></th>');
                bgcolor = "#28a745";
                bdcolor = "#28a745";
                size = "32px";
                bdsize = "0px";
                top = "0rem";
                left = "0rem";


                //all the cases are recovered
                // c ===> 0, 10, 100, 1000, 10000
                // size =>0,  4,   8,   16,    32

                if (places[d].a[i] >= 10000) {
                    size = "32px"
                    top = "-.45rem";
                    left = "-.35rem";


                } else if (places[d].a[i] < 10000 && places[d].a[i] >= 1000) {
                    size = "24px";
                    top = "-.2rem";
                    left = "-.1rem";

                } else if (places[d].a[i] < 1000 && places[d].a[i] >= 100) {
                    size = "16px";
                    top = "0rem";
                    left = ".1rem";;


                } else if (places[d].a[i] < 100 && places[d].a[i] >= 10) {
                    size = "10px";
                    top = ".25rem";
                    left = ".25rem";

                } else if (places[d].a[i] < 10 && places[d].a[i] >= 1) {
                    size = "8px";
                    top = ".25rem";
                    left = ".25rem";
                } else {
                    size = "0px";
                    bdsize = "0px";
                }


                // a/c rate ==> red, oregen, yellow, green{plus yellow}
                // color ==>  recover:  #28a745
                // a ===>
                acrate = places[d].a[i] / places[d].c[i]

                colors = chroma.scale('YlOrRd').mode('lch').colors(6);
                if (acrate > 0.995) {
                    bgcolor = colors[5];
                } else if (acrate >= 0.9 && acrate <= 0.995) {
                    bgcolor = colors[4];
                } else if (acrate >= 0.5 && acrate <= 0.9) {
                    bgcolor = colors[3];
                } else if (acrate >= 0.3 && acrate <= 0.5) {
                    bgcolor = colors[2];
                } else if (acrate >= 0.2 && acrate <= 0.3) {
                    bgcolor = colors[1];
                } else if (acrate < 0.2 && places[d].c[i] > 100) {
                    bgcolor = '#28a745';
                } else {
                    bgcolor = colors[1];

                }

                $('.cell-' + d.replace(" ", "") + '-' + i.toString())
                    .css("background-color", bgcolor)
                    .css("border", bdsize + " solid " + bdcolor)
                    .css("width", size)
                    .css("height", size)
                    .css("margin-top", top)
                    .css("margin-left", left);


            }



            //when lick on a country's row, the info panel will show the information related to that country/place
            $("tr#" + d.replace(" ", "") + "-row").on("click", function () {
                // places[d] = calPlace(d);
                showPlace(d);

                chart.load({
                    columns: [places[d].c, places[d].d],
                    unload: ['Aggr. Confirmed', 'Death'],
                });
            })



        })

    }

    //switch to show the situational-heatmap feature
    $('#areaSwitcher').change(function () {

        $('.loader').show();

        $("#rankingToggle").css('visibility', 'visible');
        $("#table").css("visibility", "visible");
        $(".leaflet-control-container").css("visibility", "hidden");


        len = places["Global Trend"].t.length
        showLen = 20
        $("thead").html('<th scope="col" style="text-align:right; width:200px !important"><b>State</b></th>');
        $("thead").append("<th style='text-align:center' >Aggr. Cfm </th>");
        $("thead").append("<th style='text-align:center' >Active Cfm. Trend</th>");


        Object.values(places["Global Trend"].t.slice(len - 1 - showLen, len)).forEach(function (d) {
            label = (new Date(d)).toString().substring(4, 10);
            $("thead").append("<th style='text-align:center' >" + label + "</th>");
        });


        $("tbody").html('');
        makeTable();


        $('.loader').fadeOut("slow");

    })

    //swithch between us and global heatmap
    $('#panelSwitcher').change(function () {
        $('.loader').show();

        //this part of content will shall when it's on global heatmap
        if (document.getElementById('panelSwitcher').checked == false) {
            $("#table").css("visibility", "hidden");

            $("#rankingToggle").css("visibility", "hidden");
            $(".leaflet-control-container").css("visibility", "visible");
            $("#content-explain").text(
                "In the main map, an country or region's inflection level is measured by the # of today's active/remaining confirmed cases. The gray slash texture indicates that no previous cases are discovered; the green slash texture  indicates the region in which all the infected cases has recovered (or passed away)."
            );
            $("thead").html('');
            $("tbody").html('');


        } else { //this part of content will shall when it's on us heatmap

            $("#rankingToggle").css('visibility', 'visible');
            $("#content-explain").text(
                "This situational heatmap (Beta) illustrates the rank of active confirmed cases in all countries or U.S. states in the descending order. It uses a series of blocks in different size and color to represent the number and recover rate of coronavirus cases of different places within the last 20 days. The size of the block increases as the number of active confirmed case increases. While the color of the block, in a \"yellow-orange-red\" ramp, gets darker as the 'active / aggregate' rate (a.k.a recover rate) increases."
            );
            $("#table").css("visibility", "visible");
            $(".leaflet-control-container").css("visibility", "hidden");

            $("#rankingText").remove();
            $("#rankingIcon").remove();
            $("#rankingSpace").remove();



            len = places["Global Trend"].t.length
            showLen = 20
            $("thead").html('<th scope="col" style="text-align:right; width:250px !important"><b>Country</b></th>');

            $("thead").append("<th style='text-align:center' >Aggr. Cfm </th>");
            $("thead").append("<th style='text-align:center' >Active Cfm. Trend</th>");

            Object.values(places["Global Trend"].t.slice(len - 1 - showLen, len)).forEach(function (d) {
                //label = new Date(new Date(d).setHours(new Date(d).getHours() + 8)).toString().substring(4,10);
                label = (new Date(d)).toString().substring(4, 10);
                // console.log(label);
                $("thead").append("<th style='text-align:center;' >" + label + "</th>");
            });


            $("tbody").html('');


            makeTable();


        }
        $('.loader').fadeOut("slow");

    })

    $(".leaflet-control-attribution")
        .css("background-color", "transparent")
        .html("");



});

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
$('.dropdown-toggle').dropdown()

$("#logarithm").on("click", function () {
    chart.internal.config.axis_y_tick_format = d3.format(",.2r");
    $(".chart-legend").css({ "left": "140px", "width": "325px" });
    $(".dropdown-toggle").text('logarithm option');
    chart.axis.types({
        y: 'log',
    });
});

$("#linear").on("click", function () {
    $(".chart-legend").css({ "left": "120px", "width": "345px" });
    $(".dropdown-toggle").text('linear option');
    chart.axis.types({
        y: 'linear',
    });
});