define(['./loadMap.js'], function(Map){
	var map;
	var createPost = {
		map: null,
		start: function() {
			map = Map.init();
			if(document.getElementById('lat').value == '' && document.getElementById('lng').value == '') {
				 if(navigator.geolocation) {
					 createPost.geolocation();
				 } else {
					 createPost.messageOpen('set marker manually');
				 }
			} else {
				Map.addMarker(map, parseFloat(document.getElementById('lat').value), parseFloat(document.getElementById('lng').value));
			}

			google.maps.event.addListener(map, 'click', function(event) {
				createPost.messageClose();
				Map.clearMarker();
				Map.addMarker(map, event.latLng.lat(), event.latLng.lng());
				document.getElementById('lat').value = event.latLng.lat();
				document.getElementById('lng').value = event.latLng.lng();
			});
					
			document.getElementById('message').onclick = function() {
				createPost.messageClose();
			};
					
			document.getElementById('lat').onchange = function() {
				createPost.messageClose();
				createPost.newMarker();
			};
			document.getElementById('lng').onchange = function() {
				createPost.messageClose();
				createPost.newMarker();
			};
		},
	
		geolocation: function() {
			if(navigator.geolocation.getCurrentPosition(function(position) {})) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var latitude = position.coords.latitude;
					var longitude = position.coords.longitude;
				});
				Map.addMarker(map, latitude, longitude);
			} else {
				createPost.messageOpen('set marker manually');
			}
		},
	
		messageOpen: function(text) {
			document.getElementById('text').innerHTML = text;
			document.getElementById('message').style.display = 'block';
		},
				
		messageClose: function() {
			document.getElementById('message').style.display = 'none';
		},
	
		newMarker: function() {
			if(document.getElementById('lat').value != '' && document.getElementById('lng').value != '') {
				Map.clearMarker();
				Map.addMarker(map, parseFloat(document.getElementById('lat').value), parseFloat(document.getElementById('lng').value));
			}
		}
	};

	return createPost.start();
});