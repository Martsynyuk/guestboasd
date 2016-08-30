define(['./loadMap.js'], function(Map) {

	var createAllMarkers = {
		map: Map.init(),
		post: JSON.parse(posts.dataset.post),
		
		start: function() {
			createAllMarkers.addMarkers();
		},
		
		addMarkers: function() {
			
			var points = [];
			var markers = null;
			var content = null;
			
			for(var i = 0; i < createAllMarkers.post.length; i++) {	
				points.push({'lat': parseFloat(createAllMarkers.post[i]['lat']), 'lng': parseFloat(createAllMarkers.post[i]['lng'])});			
				markers = Map.addMarker(createAllMarkers.map, parseFloat(createAllMarkers.post[i]['lat']), parseFloat(createAllMarkers.post[i]['lng']));
				
				content = '<div style="color: black;" class="wininfo">'+ 
							'<div class="title">'+ createAllMarkers.post[i]['title'] +
							'<div class="text">' + createAllMarkers.post[i]['body'] +
							'</div>'+
							'</div>'+
							'</div>';
				
				createAllMarkers.eventsOnMarkers(markers, content);
			}
			createAllMarkers.centeringMap(points);
		},
		
		centeringMap: function(points) {
			var latlngbounds = new google.maps.LatLngBounds();
			for ( var i = 0; i < points.length; i++ ){
			     latlngbounds.extend(points[i]);
			}
			createAllMarkers.map.setCenter( latlngbounds.getCenter(), createAllMarkers.map.fitBounds(latlngbounds));
		},
		
		eventsOnMarkers: function(markers, content) {
			var infowindow = new google.maps.InfoWindow({
			    content: content
			});
			
			markers.addListener('click', function() {
			    infowindow.open(createAllMarkers.map, markers);
			});
		}
	}
	return createAllMarkers.start();
});