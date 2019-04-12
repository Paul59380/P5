class LoadMap {
    load(d_city, d_lat, d_lon, f_city, f_lat, f_lon) {
        var lat = 51.034368;
        var lon = 2.376776;
        var macarte = null;

        macarte = L.map('map').setView([lat, lon], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 9
        }).addTo(macarte);
        window.onload = function () {
            LoadMap.test(d_city, d_lat, d_lon, f_city, f_lat, f_lon, macarte);
        };
    }

    static test(d_city, d_lat, d_lon, f_city, f_lat, f_lon, macarte) {
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
            const marker = L.marker([lat, lng]).addTo(macarte);
        });
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
