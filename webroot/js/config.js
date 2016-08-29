requirejs.config({
    baseUrl: '/webroot/js',
    paths: {
    	googleMaps: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgnsp7HMAHLR_ntjubgpnt3A8evQvsgg',
    	jquery: 'jquery-3.1.0',
    	cookie: 'jquery.cookie',
    },
});

define('map', ['googleMaps'], function(){
	return require(['loadMap'], function() {
		
	});
});

