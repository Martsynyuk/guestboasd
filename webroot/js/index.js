define(['./loadMap.js', 'mustache'], function(Map, mustache) {

	var createAllMarkers = {
			
		map: Map.init(),
		post: JSON.parse(posts.dataset.post),
		content: '<div style="color: black;" class="wininfo"><div class="title">{{title}}</div><div class="text">{{body}}</div></div>',
		
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
				
				createAllMarkers.eventsOnMarkers(markers, 
					mustache.render(createAllMarkers.content,
						{title: createAllMarkers.post[i]['title'], body: createAllMarkers.post[i]['body']})
				);
			}
			Map.centeringMap(points, createAllMarkers.map);
		},

		eventsOnMarkers: function(markers, content) {
			var infowindow = Map.infoWindows(content);
			
			markers.addListener('click', function() {
			    infowindow.open(createAllMarkers.map, markers);
			});
		}
	};

	return createAllMarkers.start();
});