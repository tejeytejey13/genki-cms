$('#stud_search').on('input', async function() {
    var value = $(this).val().toLowerCase();

    try {
        var response = await $.ajax({
            url: "backend/search_student.php",
            type: "POST",
            data: {
                search: value
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                $.each(data, function(index, item) {
                    $('#student_fullname').val(item.first_name + " " + item.last_name);
                    $('#grade_level').val(item.grade);
                    $('#adviser').val(item.adviser);
                })
            }
        });

    } catch (error) {
        // Handle error here
        console.error("Error:", error);
    }
});