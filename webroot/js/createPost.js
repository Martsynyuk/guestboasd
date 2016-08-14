"use strict";
$(document).ready(function() {

	if($('#lat').val() == '' && $('#lng').val() == '') {
		 if(navigator.geolocation) {
			 createPost.geolocation();
		 } else {
			 createPost.messageOpen('set marker manually');
		 }
	} else {
		Markers.addMarker(parseFloat($('#lat').val()), parseFloat($('#lng').val()));
	}
	
	$('#message, #map').on('click', function(){
		createPost.messageClose();
	});
	
	Map.loadMap.addListener('click', function(event) {
		Markers.clearMarker();
		Markers.addMarker(event.latLng.lat(), event.latLng.lng());
		$('#lat').val(event.latLng.lat());
		$('#lng').val(event.latLng.lng());
	});
	
	$('#lat, #lng').on('change', function() {
		createPost.messageClose();
		createPost.newMarker();
	});
});

var createPost = {

	geolocation: function() {
		if(navigator.geolocation.getCurrentPosition(function(position) {})) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var latitude = position.coords.latitude;
				var longitude = position.coords.longitude;
			});
			Markers.addMarker(latitude, longitude);
		} else {
			createPost.messageOpen('set marker manually');
		}
	},
	
	messageOpen: function(text) {
		$('#text').text(text);
		$('#message').css('display', 'block');
	},
	
	messageClose: function() {
		$('#message').css('display', 'none');
	},
	
	newMarker: function() {
		if($('#lat').val() != '' && $('#lng').val() != '') {
			Markers.clearMarker();
			Markers.addMarker(parseFloat($('#lat').val()), parseFloat($('#lng').val()));
		}
	}
}