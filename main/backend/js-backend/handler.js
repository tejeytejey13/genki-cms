$(function () {
  $("#login-form").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./main/backend/login.php",
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if(data.status === "success"){
            if (data.user_type === 'client') {
                window.location.href = 'main/index.php';
            } else if(data.user_type === 'nurse') {
                window.location.href = 'main/index.php';
            } else if(data.user_type === 'admin') {
                window.location.href = 'main/index.php';
            } else {
                alert(data.message);
            }
        }else{
            alert(data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  $('#logout-btn, #logout-btn-2').click(function() {
    $.ajax({
      type: "POST",
      url: "./backend/logout.php",
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          window.location.href = '../index.php';
        } else {
          alert(data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
  

});