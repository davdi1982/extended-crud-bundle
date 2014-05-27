$(document).ready(function() {
    $('.crud-delete').click(function() {
        $('#entity-delete .btn-danger').attr('data-id', $(this).attr('data-id'));
        $('#entity-delete .btn-danger').attr('data-entity', $(this).attr('data-entity'));
        $('#entity-delete').modal();
        return false;
    });
    $('#entity-delete .btn-danger').click(function() {
        $.ajax({
            type: 'DELETE',
            url: 'http://symfony.debian/app_dev.php/crud-delete/' + $(this).attr('data-entity') + '/' + $(this).attr('data-id')
        }).done(function(){
            location.reload();
        });
    });

});

