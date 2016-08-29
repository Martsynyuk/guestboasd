"use strict";

require(['loadMap'], function(){
	
	var createPost = {
	
		start: function() {
			if(document.getElementById('lat').value == '' && document.getElementById('lng').value == '') {
				 if(navigator.geolocation) {
					 createPost.geolocation();
				 } else {
					 createPost.messageOpen('set marker manually');
				 }
			} else {
				Map.addMarker(parseFloat(document.getElementById('lat').value), parseFloat(document.getElementById('lng').value));
			}
			
			Map.loadMap.addListener('click', function(event) {
				createPost.messageClose();
				Map.clearMarker();
				Map.addMarker(event.latLng.lat(), event.latLng.lng());
				document.getElementById('lat').value = event.latLng.lat();
				document.getElementById('lng').value = event.latLng.lng();
			});
					
			document.getElementById('message').onclick = function() {
				createPost.messageClose();
			}
					
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
			Map.addMarker(latitude, longitude);
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
				Map.addMarker(parseFloat(document.getElementById('lat').value), parseFloat(document.getElementById('lng').value));
			}
		}
	}
	document.addEventListener("DOMContentLoaded ", createPost.start());
});