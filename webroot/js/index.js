define(['./loadMap.js'], function(Map) {

	var createAllMarkers = {
		map: Map.init(),
		post: JSON.parse(posts.dataset.post),
		start: function() {
			createAllMarkers.addMarkers();
		},
		
		addMarkers: function() {
			var content = null;
			var points = [];
			var windows = [];
			var markers = [];
			for(var i = 0; i < createAllMarkers.post.length; i++) {
				content = '<div style="color: black;" class="wininfo">'+ 
				    		'<div class="title">'+ createAllMarkers.post[i]['title'] +
				    		'<div class="text">' + createAllMarkers.post[i]['body'] +
				    		'</div>'+
				    		'</div>'+
							'</div>';
				points.push({'lat': parseFloat(createAllMarkers.post[i]['lat']), 'lng': parseFloat(createAllMarkers.post[i]['lng'])});
				windows.push(Map.infoWindows(content));			
				markers.push(Map.addMarker(createAllMarkers.map, parseFloat(createAllMarkers.post[i]['lat']), parseFloat(createAllMarkers.post[i]['lng'])));
			}
			createAllMarkers.centeringMap(points);
			
			markers[0].addListener('click', function() {
				windows[0].open(createAllMarkers.map, markers[0]);
			});
		},
		
		centeringMap: function(points) {
			var latlngbounds = new google.maps.LatLngBounds();
			for ( var i=0; i < points.length; i++ ){
			     latlngbounds.extend(points[i]);
			}
			createAllMarkers.map.setCenter( latlngbounds.getCenter(), createAllMarkers.map.fitBounds(latlngbounds));
		}
	}
	//return console.log(createAllMarkers.post);
	return createAllMarkers.start();
});