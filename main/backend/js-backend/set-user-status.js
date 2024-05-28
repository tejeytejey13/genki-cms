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

function deleteAccountUser(userAccount_ID){
    alert('still in development ' + userAccount_ID);
}

$(document).ready(function() {
    $('#searchAccountInput').on('keyup', function() {
        var query = $(this).val();

        $.ajax({
            url: 'backend/search-account.php',
            type: 'POST',
            data: { query: query },
            success: function(response) {
                var users = JSON.parse(response);
                var tableBody = $('tbody');
                tableBody.empty();

                users.forEach(function(user) {
                    var userRow = `
                        <tr>
                            <td class="is-checkbox-cell">
                                <label class="b-checkbox checkbox">
                                    <input type="checkbox" value="false">
                                    <span class="check"></span>
                                </label>
                            </td>
                            <td class="is-image-cell">
                                <div class="image">
                                    <img src="${user.profile}" class="is-rounded">
                                </div>
                            </td>
                            <td data-label="Name">${user.school_id}</td>
                            <td data-label="Company">${user.fullname}</td>
                            <td data-label="City">${user.email}</td>
                            <td data-label="Status" class="status ${user.stats}">${user.status}</td>
                            <td class="is-actions-cell">
                                <div class="buttons is-left">
                                    <button class="button is-small is-primary edit-user-status" data-target-uid="${user.id}" data-target-name="${user.fullname}" type="button">
                                        <span class="icon"><i class='mdi mdi-pen'></i></span>
                                    </button>
                                    <!-- <button class="button is-small is-danger" onclick="deleteAccountUser('${user.id}')" type="button">
                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                    </button> -->
                                </div>
                            </td>
                        </tr>
                    `;
                    tableBody.append(userRow);
                });
            }
        });
    });
});