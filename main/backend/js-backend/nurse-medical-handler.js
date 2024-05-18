$(function () {
    refreshTable();
  
    // $('.selectAll').change(function() {
    //     $(".selectRow").prop('checked', $(this).prop("checked"));
    // });
  
    // $(".selectRow").change(function() {
    //     if (!$(this).prop("checked")) {
    //         $("#checkAll").prop('checked', false);
    //     }
    // });
    function refreshTable() {

      $.ajax({
        url: "backend/get-medical-appointments.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
          $("#nurseTable").empty();
          $("#nurseHistoryTable").empty();
          $("#nurseMedicalRecord").empty();

          $.each(response, function (index, row) {
            console.log(row);
            
            var firstName = row.first_name.charAt(0).toUpperCase() + row.first_name.slice(1).toLowerCase();
            var lastName = row.last_name.charAt(0).toUpperCase() + row.last_name.slice(1).toLowerCase();
            var paentGuardian = row.parent_guardian.charAt(0).toUpperCase() + row.parent_guardian.slice(1).toLowerCase();
            
            const baseurl = window.location.href.split('?')[1];
            // console.log(baseurl);
            if(baseurl == 'status=pending'){
              if(row.status == 'pending'){
                var trNurse = "<tr>";
                trNurse += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
                trNurse +="<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
                trNurse += "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
                trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
                trNurse += "<td data-label='parent_name'>" + paentGuardian + "</td>";
                trNurse += "<td data-label='section'>aw</td>";
                //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
                trNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
                formatDate(row.date_created) +
                "</small></td>";
                trNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_med) + "</small></td>";
                trNurse += "<td data-label='status'>" + row.status + "</td>";
                trNurse += "<td class='is-actions-cell'><div class='buttons is-right'><button class='button is-small is-primary nurse-view-btn' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>"
                + "<button class='button is-small is-warning nurse-edit-btn' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>"
                + "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
                trNurse += "</tr>";
              }
            }else{
              if(row.status == 'approved'){
                var trNurse = "<tr>";
                trNurse += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
                trNurse +="<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
                trNurse += "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
                trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
                trNurse += "<td data-label='parent_name'>" + paentGuardian + "</td>";
                trNurse += "<td data-label='section'>aw</td>";
                //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
                trNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
                formatDate(row.date_created) +
                "</small></td>";
                trNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_med) + "</small></td>";
                trNurse += "<td data-label='status'>" + row.status + "</td>";
                trNurse += "<td data-label='consultation'>" + row.consultation_status + "</td>";
                trNurse += "<td class='is-actions-cell'><div class='buttons is-right'><button class='button is-small is-primary nurse-view-btn' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>"
                + "<button class='button is-small is-warning nurse-consultation-form' data-target-uid='"+ row.user_id +"' data-target-uid2='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>"
                + "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
                trNurse += "</tr>";
              }
            }
            
            // row.sess_nurse_id == row.nurse_id || row.consultation_status !== 'pending' && row.sess_nurse_id == 3
            if(row.sess_nurse_id == row.nurse_id || row.sess_nurse_id == 3 && row.consultation_status !== 'pending' ) {
              var trhistoryNurse = "<tr>";
              trhistoryNurse += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
              trhistoryNurse +="<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
              trhistoryNurse += "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
              trhistoryNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_created) + "</small></td>";
              trhistoryNurse += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_med) + "</small></td>";
              trhistoryNurse += "<td data-label='status'>" + row.status + "</td>";
              trhistoryNurse += "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-med-view-btn' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>"
              + "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
              trhistoryNurse += "</tr>";

              var trMedicalRecord = "<tr>";
              trMedicalRecord += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
              trMedicalRecord +="<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
              trMedicalRecord += "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
              trMedicalRecord += "<td data-label='Grade'>" + row.grade + "</td>";
              trMedicalRecord += "<td data-label='parent_name'>" + paentGuardian + "</td>";
              trMedicalRecord += "<td data-label='section'>"+ row.section +"</td>";
              //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
              trMedicalRecord += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_created) + "</small></td>";
              trMedicalRecord += "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" + formatDate(row.date_med) + "</small></td>";
              // trMedicalRecord += "<td data-label='status'>" + row.status + "</td>";
              trMedicalRecord += "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary ' data-target-uid='"+ row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>"
              + "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
              trMedicalRecord += "</tr>";
            }


            $("#nurseTable").append(trNurse);
            $("#nurseHistoryTable").append(trhistoryNurse);
            $("#nurseMedicalRecord").append(trMedicalRecord);

          });
          
          // View button nurse-table
          $('.nurse-view-btn').click(function(){
            $('#nurse-view-med-form').addClass('is-active');
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
                // console.log(object);
                $('#heading-name').html('Name of Patient: ' + object.first_name + " " + object.last_name);
                $('#heading-date').html('Date Created: ' +formatDate(object.date_created));
                $('#heading-date1').html('Date of Clinic: ' + formatDate(object.date_med));
                $('#heading-status').html('Status: ' + object.status);
                // if(object.)
                // $('#attending-nurse').html('Date of Clinic: ' + object.status);
              },
              error: function (xhr, status, error) {
                console.log(xhr.responseText);
              }
            })
          });

          // View button nurse-history-table
          $('.nurse-med-view-btn').click(function(){
            $('#view-med-form').addClass('is-active');
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
                console.log(object);
                $('#heading-name').html('Name of Patient: ' + object.first_name + " " + object.last_name);
                $('#heading-date').html('Date Created: ' +formatDate(object.date_created));
                $('#heading-date1').html('Date of Clinic: ' + formatDate(object.date_med));
                $('#heading-status').html('Status: ' + object.status);
                $('#attending-nurse').html('Attending Nurse: ' + object.nurse_name);
              },
              error: function (xhr, status, error) {
                console.log(xhr.responseText);
              }
            });
          });

          $('.nurse-consultation-form').click(function() {
            const studentID = $(this).data('target-uid');
            const formID = $(this).data('target-uid2');
            window.location.href = "./medical-certificate.php?student_id=" + studentID + "&form_id=" + formID;
          });
          // function consulationFormStudent(studentID) {
          //   $.ajax({
          //     url: "backend/get-consulation-form.php",
          //     type: "GET",
          //     dataType: "json",
          //     data: {
          //       student_id: studentID
          //     },
          //     success: function (response) {
          //       $('#stud_id').val(response);
          //     },
          //     error: function (xhr, status, error) {
          //       console.log(xhr.responseText);
          //     }
          //   });
          // }

          //Edit button
          $('.nurse-edit-btn').click(function(){
            $('#nurse-edit-med-form').addClass('is-active');
            var uid = $(this).data('target-uid');
            $.ajax({
                url: "backend/get-specific-med-history.php",
                type: "GET",
                dataType: "json",
                data: {
                  uid: uid
                },
                success: function (response) {
                    var object = response[0];
                //   console.log(object);
                    $('#heading-name-edit').html('Name of Patient: ' + object.first_name + " " + object.last_name);
                //   $('#heading-status-edit').val(object.status);
                    $('#update-form-btn').attr('data-target-form-id', object.form_id);


                },
                error: function (xhr, status, error) {
                  console.log(xhr.responseText);
                }
              })
          });

        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    }

    // Update button
    $('#update-form-btn').click(function() {
        var form_id = $(this).data('target-form-id');
        var status = $('#heading-status-edit').val();
        console.log(status);
        $.ajax({
            url: "backend/update-specific-med-form.php",
            type: "POST",
            data: {
                form_id: form_id,
                status: status
            },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        })
    });
    // setInterval(refreshTable, 2000);
  });

  function deleteData(){
    // Swal.fire({
    //   title: "Are you sure?",
    //   text: "You won't be able to revert this!",
    //   icon: "warning",
    //   showCancelButton: true,
    //   confirmButtonColor: "#3085d6",
    //   cancelButtonColor: "#d33",
    //   confirmButtonText: "Yes, archive it!"
    // }).then((result) => {
    //   if (result.isConfirmed) {
    //     Swal.fire({
    //       title: "Deleted!",
    //       text: "Your file has been archive.",
    //       icon: "success"
    //     });
    //   }
    // });
  }
  
  function formatDate(date) {
    var timestamp = new Date(date);
    var month = timestamp.toLocaleString("default", { month: "short" }); // Get 3-letter month name
    var day = timestamp.getDate(); // Get the day
    var year = timestamp.getFullYear(); // Get the year
    var formattedDate = month + " " + day + ", " + year;
    return formattedDate;
  };


  