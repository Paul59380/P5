const init = new LoadMap();
const test = init.extractUrlParams();
init.load(test.d_city,test.d_lat,test.d_lon, test.f_city, test.f_lat, test.f_lon);

// for test with parameters  : http://localhost/P5/index.php?action=homeUser&d_city=Dunkerque&d_lat=51.034368&d_lon=2.376776&f_city=Graveline&f_lat=50.9833&f_lon=2.1167
