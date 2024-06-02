$(function () {

  $.ajax({
    type: "POST",
    url: "backend/get-slots-clearance.php",
    success: function (result) {
      var data = JSON.parse(result);
      // console.log(data);
      var dayCells = document.querySelectorAll('.day-number');
      
      // if(data.status === 'error') {
      //   localStorage.clear();
      // }

      // localStorage.setItem('eventDates', JSON.stringify(data.map(item => item)));
      // $.each(data, function (index, item) {
      //   let htmlContent = 
      //   '<div class="container-selectedDate" >' +
      //   '<div class="dropdown">' +
      //     '<button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">' +
      //     '<span class="icon"><i class="mdi mdi-view-list"></i></span>' +
      //     '<span class="menu-item-label">' +
      //     formatDate(item.date) +
      //     "</span>" +
      //     '<span class="dropdown-icon"><i class="mdi mdi-plus"></i></span>' +
      //     "</button>" +
      //     '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';

      //   $.each(data, function (index, item) {
      //     //   htmlContent += "<li>" + item.name + "</li>";
      //   });

      //   htmlContent += "</ul>";
      //   htmlContent += "</div>";
      //   htmlContent += "</div>";
      //   $("#show-slots").append(htmlContent);
      // });

    },
  });

  function formatDate(date) {
    const dateObj = new Date(date);
    const options = { month: "long", day: "numeric", year: "numeric" };
    return dateObj.toLocaleDateString("en-US", options);
  }
});

function deleteClearanceSlot(slot_id){
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'backend/delete_users_slot.php',
        type: 'POST',
        data: {
          slotUID: slot_id
        },
        success: function(response){
          console.log(response);
        },
        error: function(xhr, status, error){
          console.log(xhr.responseText);
        }
      });
    }
  });
  
}