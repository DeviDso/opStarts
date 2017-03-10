initMap(long, lat);

function initMap(long, lat) {
    document.getElementById('map2').style.display = "block";
    var myLatLng = {lat: lat, lng: long};

    var map = new google.maps.Map(document.getElementById('map2'), {
        zoom: 16,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}