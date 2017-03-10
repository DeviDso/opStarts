<script>
    var map;
    var pageLat = parseFloat('{{ $page->map_lat }}');
    var pageLong = parseFloat('{{ $page->map_long }}');

    function initMap() {
        var myLatlng = new google.maps.LatLng(pageLat, pageLong);
        var mapOptions = {
            zoom: 15,
            center: myLatlng
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">{{ $page->name }}</h1>'+
                '<div id="bodyContent">'+
                'City: {{ \opStarts\Cities::getName($page->city) }}'+
                '<p>Visit website: <a href="{{ $page->website }}"> {{ $page->name }}</a>'+
                '</div>'+
                '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '{{ $page->name }}'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-czJmy1SCXZHwsGGMHMdqzDHGsumsk9k&callback=initMap"
        async defer></script>
<script>
    var cover = document.getElementById('single_page_view_top');
    var coverURL = '<?php echo url('') ."/" . $page->cover; ?>';

    cover.style.background = 'url("' + coverURL +'") no-repeat';
    cover.style.backgroundSize = 'cover';
</script>
<script src="{{ url('') }}/gall/js/lightgallery.min.js"></script>

<script src="{{ url('') }}/gall/js/lg-thumbnail.min.js"></script>
<script src="{{ url('') }}/gall/js/lg-fullscreen.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#lightgallery").lightGallery();
    });
</script>