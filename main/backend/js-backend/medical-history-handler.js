$(function () {
  refreshTable();

  $('.selectAll').change(function() {
      $(".selectRow").prop('checked', $(this).prop("checked"));
  });

  $(".selectRow").change(function() {
      if (!$(this).prop("checked")) {
          $("#checkAll").prop('checked', false);
      }
  });
  function refreshTable() {
    $.ajax({
      url: "backend/get-medical-history.php",
      type: "GET",
      dataType: "json",
      success: function (response) {
        $("#dataTable").empty();

        $.each(response, function (index, row) {
          // console.log(row.id);
          
          var firstName = row.first_name.charAt(0).toUpperCase() + row.first_name.slice(1).toLowerCase();
          var lastName = row.last_name.charAt(0).toUpperCase() + row.last_name.slice(1).toLowerCase();
          var paentGuardian = row.parent_guardian.charAt(0).toUpperCase() + row.parent_guardian.slice(1).toLowerCase();

          var tr = "<tr>";
          tr += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
          tr +=
            "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
          tr += "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
          tr += "<td data-label='Grade'>" + row.grade + "</td>";
          tr += "<td data-label='parent_name'>" + paentGuardian + "</td>";
          //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
          tr +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_created) +
            "</small></td>";
          tr += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_med) + "</small></td>";
          tr += "<td data-label='status'>" + row.status + "</td>";
          tr += "<td class='is-actions-cell'><div class='buttons is-right'><button class='button is-small is-primary view-btn' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></div></td>";
          tr += "</tr>";

          $("#dataTable").append(tr);
        });

        $('.view-btn').click(function(){
          $('#user-view-med-form').addClass('is-active');
          var uid = $(this).data('target-uid');
          // console.log(uid);
          $.ajax({
            url: "backend/get-specific-med-history.php",
            type: "GET",
            dataType: "json",
            data: {
              uid: uid
            },
            success: function (response) {
              var object = response[0];
              // console.log(specificObject.first_name);
                $('#heading-name').html('Name of Patient: ' + object.first_name + " " + object.last_name);
                $('#heading-date').html('Date Created: ' +formatDate(object.date_created));
                $('#heading-date1').html('Date of Clinic: ' + formatDate(object.date_med));
                $('#heading-status').html('Status: ' + object.status);
                // if(object.)
                $('#attending-nurse').html('Attending Nurse: ' + object.nurse_name);
            },
            error: function (xhr, status, error) {
              console.log(xhr.responseText);
            }
          })
        });

      },
    });
  }

  // setInterval(refreshTable, 2000);
});

function formatDate(date) {
  var timestamp = new Date(date);
  var month = timestamp.toLocaleString("default", { month: "short" }); // Get 3-letter month name
  var day = timestamp.getDate(); // Get the day
  var year = timestamp.getFullYear(); // Get the year
  var formattedDate = month + " " + day + ", " + year;
  return formattedDate;
}
