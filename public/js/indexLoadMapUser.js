const init = new LoadMap();
const searchCities = init.extractUrlParams();
loadUserMap(searchCities.d_city, searchCities.d_lat, searchCities.d_lon, searchCities.f_city, searchCities.f_lat, searchCities.f_lon, searchCities.u_name, searchCities.u_lat, searchCities.u_lon);

//test url : http://localhost/P5test/index.php?action=adminSearchBoat&capacity=2000&idTrip=2&d_city=Bottrop&d_lat=51.6061&d_lon=6.9154&f_city=Rety&f_lat=50.8&f_lon=1.76667&u_name=Paul&u_lat=51.034368&u_lon=2.376776
