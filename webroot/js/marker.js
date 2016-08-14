"use strict";
$(document).ready(function() {
	
});

var Markers = {
	markers: [],
	addMarker: function (lat, lng) {
					var marker = new google.maps.Marker({
						position: {lat: lat, lng: lng},
						map: Map.loadMap,
				});	
				Markers.markers.push(marker);
			},
	clearMarker: function () {
				if(Markers.markers.length > 0) {
					for(var i = 0; i < Markers.markers.length; i++) {
						Markers.markers[i].setMap(null);
					}
				}
			},
}