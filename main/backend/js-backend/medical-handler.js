$(function() {
    function checkInputs() {
        $('input').each(function() {
            if ($(this).val() !== '') {
                $(this).addClass('is-success');
            } else {
                $(this).removeClass('is-success');
            }
        });
    }
    checkInputs();
    $('input').on('input', checkInputs);

    function toggleCheckbox(checkbox) {
        var otherCheckbox = checkbox.attr('id') === 'yes' ? $('#no') : $('#yes');
        if (checkbox.prop('checked')) {
            otherCheckbox.prop('checked', false);
        }
    }
    $('.selectedOption').change(function() {
        toggleCheckbox($(this));
    });

    $('#medical-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "backend/medical.php",
            data: formData,
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                console.log(data);
                if(data.status === "success") {
                    // alert(data.message);
                    $('#status').text(data.message);
                    $('#success-modal').addClass('is-active');
                    $('#medical-form')[0].reset();
                    $('input').removeClass('is-success');
                }
            }
        })
    })

    $('.jb-modal-close').click(function() {
        $('#success-modal').removeClass('is-active');
    });

    $('#reset-form').click(function() {
        $('#medical-form')[0].reset();
        $('input').removeClass('is-success');
    });
});