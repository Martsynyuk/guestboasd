"use strict";
if(document.readyState == 'complete') {

}
 
var Map = {
	loadMap: new google.maps.Map(document.getElementById('map'), {
				center: {lat: 49.007073, lng: 30.2600184},
				zoom: 6
			}),
}
