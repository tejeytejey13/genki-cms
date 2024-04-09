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
//   https://avatars.dicebear.com/v2/initials/john-doe.svg
});
