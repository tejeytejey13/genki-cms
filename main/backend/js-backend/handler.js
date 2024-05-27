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
        console.log(response);
        if(data.status === "success"){
            window.location.href = 'main/index.php';
        }else{
          showToast(data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  function showToast(message) {
    // Create a new toast element
    var toastId = 'toast-' + new Date().getTime();
    var toastHtml = `
        <div id="${toastId}" class="toast show" data-autohide="true">
            <div class="toast-header">
                <strong class="mr-auto text-primary">Toast Header</strong>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;
    
    // Append the new toast to the toast container
    $('#toast-container').append(toastHtml);
    
    // Automatically remove the toast after 5 seconds
    setTimeout(function() {
        $('#' + toastId).remove();
    }, 3000);
}

  $("#register-form").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    // console.log(formData);
    $.ajax({
      type: "POST",
      url: "./main/backend/register.php",
      data: formData,
      success: function (response) {
        var data = JSON.parse(response);
        if(data.status === "success"){
          window.location.href = 'index.php';
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