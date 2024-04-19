$(function () {
  $.ajax({
    type: "POST",
    url: "backend/get-slots-clearance.php",
    success: function (result) {

      var data = JSON.parse(result);
      localStorage.setItem('eventDates', JSON.stringify(data.map(item => item.date)));
      $.each(data, function (index, item) {
        let htmlContent = 
        '<div class="container-selectedDate" >' +
        '<div class="dropdown">' +
          '<button class="dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">' +
          '<span class="icon"><i class="mdi mdi-view-list"></i></span>' +
          '<span class="menu-item-label">' +
          formatDate(item.date) +
          "</span>" +
          '<span class="dropdown-icon"><i class="mdi mdi-plus"></i></span>' +
          "</button>" +
          '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';

        $.each(data, function (index, item) {
          //   htmlContent += "<li>" + item.name + "</li>";
        });

        htmlContent += "</ul>";
        htmlContent += "</div>";
        htmlContent += "</div>";
        $("#show-slots").append(htmlContent);


        // const eventDate = new Date(item.date);
        // const eventMonth = eventDate.getMonth() + 1;
        // const eventYear = eventDate.getFullYear();
        // const dayCell = document.querySelectorAll('.day-number');
        // const dayOfMonth = eventDate.getDate();
        // // dayCell = parseInt(dayCell.textContent);
        
        // if(eventMonth == mn && eventYear == yr) {
        //     dayCell.forEach(function(dayCell) {
        //         var daynum = parseInt(dayCell.textContent);
        //         if(daynum == dayOfMonth) {
        //             dayCell.classList.add('event');
        //         }
        //     });
        // }
        
      });

    },
  });

  function formatDate(date) {
    const dateObj = new Date(date);
    const options = { month: "long", day: "numeric", year: "numeric" };
    return dateObj.toLocaleDateString("en-US", options);
  }
});
