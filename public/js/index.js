const init = new LoadMap();
const searchCities = init.extractUrlParams();
init.load(searchCities.d_city,searchCities.d_lat,searchCities.d_lon, searchCities.f_city, searchCities.f_lat, searchCities.f_lon);

// for searchCities with parameters  : http://localhost/P5/index.php?action=homeUser&d_city=Dunkerque&d_lat=51.034368&d_lon=2.376776&f_city=Graveline&f_lat=50.9833&f_lon=2.1167
