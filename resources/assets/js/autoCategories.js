$( function() {
    function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#log" ).scrollTop( 0 );
    }

    $( "#birds" ).autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url: "http://opstarts.dev/opStarts/export/data/categories",
                dataType: "jsonp",
                data: {
                    term: request.term
                },
                success: function( data ) {
                    response( data );
                }
            } );
        },
        minLength: 2,
        select: function( event, ui ) {
            log( "Selected: " + ui.item.value + " aka " + ui.item.id );
        }
    } );
} );