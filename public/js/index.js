const init = new LoadMap();
const test = init.extractUrlParams();
init.load(test.d_city,test.d_lat,test.d_lon, test.f_city, test.f_lat, test.f_lon);
