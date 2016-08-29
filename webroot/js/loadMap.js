"use strict";

define('map', ['googleMaps'], function(){

	var Map = {
		markers: [],
		loadMap: new google.maps.Map(document.getElementById('map'), {
					center: {lat: 49.007073, lng: 30.2600184},
					zoom: 6
				}),
		addMarker: function (lat, lng) {
					var marker = new google.maps.Marker({
						position: {lat: lat, lng: lng},
						map: Map.loadMap,
				});	
					Map.markers.push(marker);
			},
		clearMarker: function () {
				if(Map.markers.length > 0) {
					for(var i = 0; i < Map.markers.length; i++) {
						Map.markers[i].setMap(null);
					}
				}
			},
	}
	return Map;
});

function func() {
	require(['map'], function() {});
};
setTimeout(func, 3000);


	

