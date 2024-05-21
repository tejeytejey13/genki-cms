$('.edit-user-status').click(function(){
    $('#user-edit-modal').addClass('is-active');
    var uid = $(this).data('target-uid');
    
    $('#user-edit-id').val(uid);
    $('#user-edit-stts').text($(this).data('target-name'));
});

$('#user-status-update').submit(function(){
    $.ajax({
        url: 'backend/edit-user-status.php',
        type: 'POST',
        data: {
            uid: $('#user-edit-id').val(),
            status: $('#status-edit').val()
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    })
});