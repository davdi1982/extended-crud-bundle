$(document).ready(function() {
    $('.crud-entity-delete').click(function() {
        $('#entity-delete .btn-danger').attr('data-id', $(this).attr('data-id'));
        $('#entity-delete .btn-danger').attr('data-entity', $(this).attr('data-entity'));
        $('#entity-delete').modal();
        return false;
    });
    $('#entity-delete .btn-danger').click(function() {
        $.ajax({
            type: 'DELETE',
            url:  Routing.generate('developathe_crud_delete', {'entity': $(this).attr('data-entity'), 'id': $(this).attr('data-id')})
        }).done(function(){
            location.reload();
        });
    });

});

