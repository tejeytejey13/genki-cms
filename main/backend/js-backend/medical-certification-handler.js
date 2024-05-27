$(document).ready(function() {
    // $('#stud_search').on('keyup focus', function() {
    //     var searchTerm = $(this).val();
    //     $.ajax({
    //         url: 'backend/search_student.php',
    //         type: 'GET',
    //         dataType: 'json',
    //         data: {search_stud: searchTerm},
    //         success: function(data) {
    //             // Clear previous suggestions
    //             // $('#suggestions').empty();
    //             // $.each(data, function(index, value) {
    //             //     $('#suggestions').append('<div class="suggestions-list-item">' + value + '</div>');
    //             // });
    //             // $('#suggestions').css('display', 'block');
    //             // $('.suggestions-list-item').on('click', function() {
    //             //     $('#stud_search').val($(this).text());
    //             //     $('#suggestions').empty();
    //             //     $('#suggestions').css('display', 'none');
    //             // });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
    $('#submit-med-form').click(function(){
        var form_id = $('#medical-certificate-form').serialize();

        $.ajax({
            url: "backend/submit-medical-cert.php",
            type: "POST",
            data: form_id,
            beforeSend: function() {
                $('#loading-show').addClass('loading');
            },
            success: function(data) {
                $('#loading-show').removeClass('loading'); 
                window.location.href = '../main/nurse-table.php?status=approved';
            }
        });
    });
});
