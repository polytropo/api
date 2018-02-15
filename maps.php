<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css" media="screen">
	#map1 {
		height: 400px;
		width: 400px;
		}
	#map2 {
		height: 400px;
		width: 400px;
		}
	</style>
	
</head>
<body>
	<h1>Google Map 1</h1>
	<div id="map1">
		
	</div>
	<h1>Google Map 2</h1>
	<div id="map2">
		
	</div>
	
	<script>

		function initMap() {

			// Map options
			var options = {
				zoom: 13,
				center: {lat:48.2082, lng:16.3738},
			};
			var options2 = {
				zoom: 10,
				center: {lat:47.2965213, lng:15.6364382},
			};
			// New map
			var map = new google.maps.Map(document.getElementById('map1'), options);
			var map2 = new google.maps.Map(document.getElementById('map2'), options2);
			// Add marker
			var marker = new google.maps.Marker({
				position:{lat:48.21, lng:16.3738},
				map: map
			});
			
			var marker2 = new google.maps.Marker({
				position: {lat:48.20, lng:16.37},
				map: map,
				icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
			});
			var infoWindow = new google.maps.InfoWindow({
				content: '<h2>Nice marker</h2>'
			})
			marker.addListener('click', function(){
				infoWindow.open(map, marker);
			});

		};

		// function initMap2() {

		// 	// Map options
		// 	var options = {
		// 		zoom: 13,
		// 		center: {lat:48.2082, lng:16.3738},
		// 	};
		// 	// New map
		// 	var map = new google.maps.Map(document.getElementById('map2'), options);
		// 	// Add marker
		// 	var marker = new google.maps.Marker({
		// 		position:{lat:48.21, lng:16.3738},
		// 		map: map
		// 	});
			
		// 	var marker2 = new google.maps.Marker({
		// 		position: {lat:48.20, lng:16.37},
		// 		map: map,
		// 		icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
		// 	});
		// 	var infoWindow = new google.maps.InfoWindow({
		// 		content: '<h2>Nice marker</h2>'
		// 	})
		// 	marker.addListener('click', function(){
		// 		infoWindow.open(map, marker);
		// 	});
		// };


	</script>
	
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH_D_UpTlbMAEvszfWqETziT0yaEQygpw&callback=initMap">
    </script>
</body>
</html>