var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    country: 'long_name',
    postal_code: 'short_name'
};


function initialize() {
    initAutocomplete();
}

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(

        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']},
        options = {
        types: ['(cities)'],
        componentRestrictions: {country: "dk"}
    });
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    var options = {
        types: ['(cities)'],
        componentRestrictions: {country: "us"}
    };

    var place = autocomplete.getPlace();

    initMap(place.geometry.location.lng(), place.geometry.location.lat())

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            console.log(val);
        }
    }
}

function initMap(long, lat) {
    document.getElementById('map').style.display = "block";
    var myLatLng = {lat: lat, lng: long};

    document.getElementById('map_lat').value = lat;
    document.getElementById('map_long').value = long;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}