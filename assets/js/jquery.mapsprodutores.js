function initialize() {
	//https://developers.google.com/maps/documentation/javascript/styling?hl=pt-br
	//https://developers.google.com/maps/documentation/javascript/reference?hl=pt-br#MapTypeStyleFeatureType
	var styles = [
	{
		featureType: 'all',
		elementType: 'all',
		stylers: [
			{ saturation: 0 },
		]
	}
];

//CALCULA CENTRO
var centro_mapa = [];
var lat_total=0;
var long_total=0;
$( ".map-place" ).each(function( i ) {
	//http://stackoverflow.com/questions/15719951/google-maps-api-v3-auto-center-map-with-multiple-markers
	//http://stackoverflow.com/questions/3520810/zoom-and-center-a-google-map-according-to-its-markers-javascript-api-v3
	centro_mapa[i]={
	  lat: $(this).data('lat'),
	  lon: $(this).data('long'),
	};
	//alert(centro_mapa[i].lat);
 });

for(i = 0; i < centro_mapa.length; i++){
	lat_total+=centro_mapa[i].lat;
	long_total+=centro_mapa[i].lon;
}

lat_total=lat_total/centro_mapa.length;
long_total=long_total/centro_mapa.length;
//CALCULA CENTRO

var firstPoint = new google.maps.LatLng(-13.931207405175746, -58.101538338275134);

  var mapOptions = {
	mapTypeControlOptions: {
		mapTypeIds: [ 'Styled']
	},
    zoom: 4,
    center: firstPoint,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
	  mapTypeId: 'Styled',
  };
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions,
	  styles);
  directionsDisplay = new google.maps.DirectionsRenderer({ suppressMarkers: true });
  var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
  map.mapTypes.set('Styled', styledMapType);
  directionsDisplay.setMap(map);

  var marker = [];

  $( ".map-place" ).each(function( i ) {
		//https://developers.google.com/maps/documentation/javascript/markers#add
		marker[i]= new google.maps.Marker({
			position: new google.maps.LatLng($(this).data('lat'), $(this).data('long')),
			map: map,
			animation: google.maps.Animation.DROP,
			icon: 'assets/img/map/map-marker.png'
		});
		// To add the marker to the map, call setMap();
		marker[i].setMap(map);
		//https://developers.google.com/maps/documentation/javascript/events?hl=pt-br
  google.maps.event.addListener(marker[i], 'click', function() {
    map.setZoom(16);
    map.setCenter(marker[i].getPosition());
  });

  /*google.maps.event.addListener(marker[i], 'click', function() {
    map.setZoom(16);
    map.setCenter(marker[i].getPosition());
  });*/

  var myCountry = document.getElementById('mark-'+i);
  google.maps.event.addDomListener(myCountry, 'click', function() {
	  map.setZoom(16);
	  map.setCenter(marker[i].getPosition());
	});

  });
  
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
  	  'libraries=places&' +
      'callback=initialize';
  document.body.appendChild(script);
}

window.onload = loadScript;