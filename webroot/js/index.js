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
			for(var i = 0; i < createAllMarkers.post.length; i++) {	
				points.push({'lat': parseFloat(createAllMarkers.post[i]['lat']), 'lng': parseFloat(createAllMarkers.post[i]['lng'])});			
				markers = Map.addMarker(createAllMarkers.map, parseFloat(createAllMarkers.post[i]['lat']), parseFloat(createAllMarkers.post[i]['lng']));
				createAllMarkers.eventsOnMarkers(markers, createAllMarkers.post[i]['title'], createAllMarkers.post[i]['body']);
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
		
		eventsOnMarkers: function(markers, title, body) {
		
			var content = '<div style="color: black;" class="wininfo">'+ 
    						'<div class="title">'+ title +
    						'<div class="text">' + body +
    						'</div>'+
    						'</div>'+
    						'</div>';
		 
			var infowindow = new google.maps.InfoWindow({
			    content: content
			});
			
			markers.addListener('click', function() {
			    infowindow.open(markers.get('createAllMarkers.'), markers);
			});
		}
	}
	return createAllMarkers.start();
});