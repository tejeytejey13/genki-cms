$(document).ready(function() {
    $('#type_findings').on('keyup focus', function() {
        var searchTerm = $(this).val();
        
        $.ajax({
            url: 'backend/search_findings.php',
            type: 'GET',
            dataType: 'json',
            data: {findings: searchTerm},
            success: function(data) {
                // Clear previous suggestions
                $('#suggestions').empty();
                $.each(data, function(index, value) {
                    $('#suggestions').append('<div class="suggestions-list-item">' + value + '</div>');
                });
                $('#suggestions').css('display', 'block');
                $('.suggestions-list-item').on('click', function() {
                    $('#type_findings').val($(this).text());
                    $('#suggestions').empty();
                    $('#suggestions').css('display', 'none');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#type_findings').on('blur', function() {
        setTimeout(function() {
            $('#suggestions').css('display', 'none');
        }, 200);
    });
    // var items = [
    //     "Apple", "Banana", "Cherry", "Date", "Elderberry", 
    //     "Fig", "Grape", "Honeydew", "Kiwi", "Lemon", 
    //     "Mango", "Nectarine", "Orange", "Papaya", "Quince", 
    //     "Raspberry", "Strawberry", "Tangerine", "Ugli fruit", "Watermelon"
    // ];

    // var type_findings = $('#type_findings');
    // var autocomList = $('#autocompleteList');

    // $('#type_findings').keyup(function(){
    //     var query = $(this).val().toLowerCase().trim();
        
    //     if (query === "") {
    //         autocomList.hide();
    //         return;
    //     }

    //      var filteredItems = items.filter(function(item) {
    //         return item.toLowerCase().indexOf(query) === 0;
    //     });

    //     autocomList.empty();
    //     if (filteredItems.length > 0) {
    //         filteredItems.forEach(function(item) {
    //             autocomList.append('<div class="autocomplete-item">' + item + '</div>');
    //         });
    //         autocomList.show();
    //     } else {
    //         autocomList.hide();
    //     }
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
