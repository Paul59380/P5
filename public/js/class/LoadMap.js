class LoadMap {
    static searchCities(d_city, d_lat, d_lon, f_city, f_lat, f_lon, macarte) {
        let villes = [
            {
                "ville": 1,
                "city": d_city,
                "position": {
                    "lat": d_lat,
                    "lng": d_lon
                }
            },
            {
                "ville": 2,
                "city": f_city,
                "position": {
                    "lat": f_lat,
                    "lng": f_lon
                }
            }
        ];
        villes.forEach(function (ville) {
            const lat = ville.position.lat;
            const lng = ville.position.lng;
            const name = ville.city;
            const marker = L.marker([lat, lng]).addTo(macarte);
            marker.bindPopup(name);
        });
    }

    load(d_city, d_lat, d_lon, f_city, f_lat, f_lon) {
        var lat = 50.6333;
        var lon = 3.0667;
        var macarte = null;

        macarte = L.map('map').setView([lat, lon], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 7
        }).addTo(macarte);
        window.onload = function () {
            LoadMap.searchCities(d_city, d_lat, d_lon, f_city, f_lat, f_lon, macarte);
        };
    }

    extractUrlParams() {
        var t = location.search.substring(1).split('&');
        var f = [];
        for (var i = 0; i < t.length; i++) {
            var x = t[i].split('=');
            f[x[0]] = x[1];
        }
        return f;
    }
}
