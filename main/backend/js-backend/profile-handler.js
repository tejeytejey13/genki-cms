$(function () {
  $("#profile_img").on("change", function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#pfp_img_onload").attr("src", e.target.result);
      $("#navbar-pfp").attr("src", e.target.result);
    };

    reader.readAsDataURL(file);
  });
  $("#pfp-form-edit").submit(function () {
    var profile_form = new FormData(this);

    $.ajax({
      url: "backend/update-profile.php?change=profile",
      type: "POST",
      data: profile_form,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  $("#profile-password-change").click(function () {
    // var password_form = $(this).serialize();
    var old_pass = $("#old_pass").val();
    var new_pass = $("#new_pass").val();
    var renew_pass = $("#renew_pass").val();

    $.ajax({
      url: "backend/update-profile.php?change=password",
      type: "POST",
      data: {
        old_pass: old_pass,
        new_pass: new_pass,
        renew_pass: renew_pass,
      },
      success: function (response) {
        // console.log(response);
        var data = JSON.parse(response);
        alert(data.message);
        $("#old_pass").val("");
        $("#new_pass").val("");
        $("#renew_pass").val("");
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
  //   https://avatars.dicebear.com/v2/initials/john-doe.svg
});
