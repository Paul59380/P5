const init = new LoadMap();
const searchCities = init.extractUrlParams();
init.load(searchCities.d_city, searchCities.d_lat, searchCities.d_lon, searchCities.f_city, searchCities.f_lat, searchCities.f_lon);

new FavoriteEvent();


