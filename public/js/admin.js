//triggered when modal is about to be shown
$(document).ready(function() {
    $('#editUrlsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var theid  = button.data('url-id');

        $.getJSON( "/api/urls/" + theid, function( data ) {
            $.each(data, function( key, val ) {
                $('#edit-' + key).val(val);
            });
        });
    });
});

