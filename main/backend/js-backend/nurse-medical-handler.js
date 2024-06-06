$(function () {
  refreshTable(1, 10);

  // $('.selectAll').change(function() {
  //     $(".selectRow").prop('checked', $(this).prop("checked"));
  // });

  // $(".selectRow").change(function() {
  //     if (!$(this).prop("checked")) {
  //         $("#checkAll").prop('checked', false);
  //     }
  // });
  function refreshTable(page, limit) {
    $.ajax({
      url: "backend/get-medical-appointments.php",
      type: "GET",
      dataType: "json",
      data: { page: page, limit: limit },
      success: function (response) {
        var alldata = response.historyData;
        pagTableData = response.data;
        totalPages = response.totalPages;
        // renderTable(pagTableData.slice(0, limit));
        renderTable(alldata);
        renderPagination(totalPages);
        // $("#nurseTable").empty();
        // $("#nurseHistoryTable").empty();
        // $("#nurseMedicalRecord").empty();

        // $.each(alldata, function (index, row) {
        //   // console.log(row);
        //   var firstName =
        //     row.first_name.charAt(0).toUpperCase() +
        //     row.first_name.slice(1).toLowerCase();
        //   var lastName =
        //     row.last_name.charAt(0).toUpperCase() +
        //     row.last_name.slice(1).toLowerCase();
        //   var paentGuardian =
        //     row.parent_guardian.charAt(0).toUpperCase() +
        //     row.parent_guardian.slice(1).toLowerCase();

        //   const baseurl = window.location.href.split("?")[1];
        //   // console.log(baseurl);
        //   if (baseurl == "status=pending") {
        //     if (row.status == "pending") {
        //       var trNurse = "<tr>";
        //       trNurse +=
        //         '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        //       trNurse +=
        //         "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        //       trNurse +=
        //         "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        //       trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
        //       trNurse +=
        //         "<td data-label='parent_name'>" + paentGuardian + "</td>";
        //       trNurse += "<td data-label='section'>aw</td>";
        //       //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
        //       trNurse +=
        //         "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //         formatDate(row.date_created) +
        //         "</small></td>";
        //       trNurse +=
        //         "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //         formatDate(row.date_med) +
        //         "</small></td>";
        //       trNurse +=
        //         "<td data-label='status' class='status in-progress'>" +
        //         row.status +
        //         "</td>";
        //       trNurse +=
        //         "<td class='is-actions-cell'><div class='buttons is-right'><button class='button is-small is-primary nurse-view-btn' data-target-uid='" +
        //         row.form_id +
        //         "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
        //         "<button class='button is-small is-warning nurse-edit-btn' data-target-uid='" +
        //         row.form_id +
        //         "' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>" +
        //         "<button class='button is-small is-danger' type='button' onclick='deleteAppointment(" +
        //         row.form_id +
        //         ")'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
        //       trNurse += "</tr>";
        //     }
        //   } else {
        //     if (
        //       row.status == "approved" &&
        //       row.consultation_status == "pending"
        //     ) {
        //       var trNurse = "<tr>";
        //       trNurse +=
        //         '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        //       trNurse +=
        //         "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        //       trNurse +=
        //         "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        //       trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
        //       trNurse +=
        //         "<td data-label='parent_name'>" + paentGuardian + "</td>";
        //       trNurse += "<td data-label='section'>aw</td>";
        //       //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
        //       trNurse +=
        //         "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //         formatDate(row.date_created) +
        //         "</small></td>";
        //       trNurse +=
        //         "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //         formatDate(row.date_med) +
        //         "</small></td>";
        //       trNurse +=
        //         "<td data-label='status' class='status open'>" +
        //         row.status +
        //         "</td>";
        //       trNurse +=
        //         "<td data-label='consultation'>" +
        //         row.consultation_status +
        //         "</td>";
        //       trNurse +=
        //         "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-view-btn' data-target-uid='" +
        //         row.form_id +
        //         "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
        //         "<button class='button is-small is-warning nurse-consultation-form' data-target-uid='" +
        //         row.user_id +
        //         "' data-target-uid2='" +
        //         row.form_id +
        //         "' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>";
        //       trNurse += "</tr>";
        //     }
        //   }

        //   // row.sess_nurse_id == row.nurse_id || row.consultation_status !== 'pending' && row.sess_nurse_id == 3
        //   if (
        //     (row.consultation_status !== "pending" &&
        //       row.sess_nurse_id == row.nurse_id) ||
        //     (row.sess_nurse_id == 1 && row.consultation_status !== "pending")
        //   ) {
        //     var trhistoryNurse =
        //       "<tr data-target-section='" +
        //       row.section +
        //       "' data-target-grade='" +
        //       row.grade +
        //       "'>";
        //     trhistoryNurse +=
        //       '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        //     trhistoryNurse +=
        //       "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        //     trhistoryNurse +=
        //       "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        //     trhistoryNurse +=
        //       "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //       formatDate(row.date_created) +
        //       "</small></td>";
        //     trhistoryNurse +=
        //       "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //       formatDate(row.date_med) +
        //       "</small></td>";
        //     trhistoryNurse +=
        //       "<td data-label='status' class='status open'>" +
        //       row.status +
        //       "</td>";
        //     trhistoryNurse +=
        //       "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-med-view-btn' data-target-uid='" +
        //       row.form_id +
        //       "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
        //       "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
        //     trhistoryNurse += "</tr>";

        //     var trMedicalRecord =
        //       "<tr data-target-section='" +
        //       row.section +
        //       "' data-target-grade='" +
        //       row.grade +
        //       "'>";
        //     trMedicalRecord +=
        //       '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        //     trMedicalRecord +=
        //       "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        //     trMedicalRecord +=
        //       "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        //     trMedicalRecord += "<td data-label='Grade'>" + row.grade + "</td>";
        //     trMedicalRecord +=
        //       "<td data-label='parent_name'>" + paentGuardian + "</td>";
        //     trMedicalRecord +=
        //       "<td data-label='section'>" + row.section + "</td>";
        //     //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
        //     trMedicalRecord +=
        //       "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //       formatDate(row.date_created) +
        //       "</small></td>";
        //     trMedicalRecord +=
        //       "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
        //       formatDate(row.date_med) +
        //       "</small></td>";
        //     // trMedicalRecord += "<td data-label='status'>" + row.status + "</td>";
        //     trMedicalRecord +=
        //       "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary view-medical-certificate' data-target-muid='" +
        //       row.form_id +
        //       "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
        //       "<button class='button is-small is-danger' type='button' onclick='deleteData()'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
        //     trMedicalRecord += "</tr>";
        //   }

        //   $("#nurseTable").append(trNurse);
        //   $("#nurseHistoryTable").append(trhistoryNurse);
        //   $("#nurseMedicalRecord").append(trMedicalRecord);
        // });
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  }
  function renderTable(tableData) {
    $("#nurseTable").empty();
    $("#nurseHistoryTable").empty();
    $("#nurseMedicalRecord").empty();
    // $.each(tableData, function (index, row) {
    //   var firstName = row.first_name.charAt(0).toUpperCase() + row.first_name.slice(1).toLowerCase();
    //   var lastName = row.last_name.charAt(0).toUpperCase() + row.last_name.slice(1).toLowerCase();
    //   var paentGuardian = row.parent_guardian.charAt(0).toUpperCase() + row.parent_guardian.slice(1).toLowerCase();

    //   const baseurl = window.location.href.split("?")[1];
    //   console.log(row.status);
    // });
    const baseurl = window.location.href.split("?")[1];
    if(baseurl == "status=approved"){
      var trNurseHeading = "<th>Status</th>";
      var NurseTableHeading = $('thead tr th:nth-child(8)');
      NurseTableHeading.after(trNurseHeading);

    }
    $.each(tableData, function (index, row) {
      var firstName =
        row.first_name.charAt(0).toUpperCase() +
        row.first_name.slice(1).toLowerCase();
      var lastName =
        row.last_name.charAt(0).toUpperCase() +
        row.last_name.slice(1).toLowerCase();
      var paentGuardian =
        row.parent_guardian.charAt(0).toUpperCase() +
        row.parent_guardian.slice(1).toLowerCase();

      // console.log(baseurl);
      if (baseurl == "status=pending") {
        if (row.status == "pending") {
          var trNurse = "<tr>";
          trNurse +=
            '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
          trNurse +=
            "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
          trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
          trNurse += "<td data-label='parent_name'>" + paentGuardian + "</td>";
          trNurse += "<td data-label='section'>" + row.section + "</td>";
          //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
          trNurse +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_created) +
            "</small></td>";
          trNurse +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_med) +
            "</small></td>";
          trNurse += "<td data-label='status' class=''>" + row.status + "</td>";
          trNurse +=
            "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-view-btn' data-target-uid='" +
            row.form_id +
            "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
            "<button class='button is-small is-warning nurse-edit-btn' data-target-uid='" +
            row.form_id +
            "' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>" +
            "<button class='button is-small is-danger' type='button' onclick='deleteAppointment(" +
            row.form_id +
            ")'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
          trNurse += "</tr>";
        }
      } else {
        if (row.status == "approved" && row.consultation_status == "pending") {
          var trNurse = "<tr>";
          trNurse +=
            '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
          
          trNurse +=
            "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
          trNurse += "<td data-label='Grade'>" + row.grade + "</td>";
          trNurse += "<td data-label='parent_name'>" + paentGuardian + "</td>";
          trNurse += "<td data-label='section'>" + row.section + "</td>";
          //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
          trNurse +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_created) +
            "</small></td>";
          trNurse +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_med) +
            "</small></td>";
          trNurse +=
            "<td data-label='status' class=''>" +
            row.status +
            "</td>";
          trNurse += "<td data-label='consultation'>" + row.consultation_status + "</td>";
          trNurse +=
            "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-view-btn' data-target-uid='" +
            row.form_id +
            "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
            "<button class='button is-small is-warning nurse-consultation-form' data-target-uid='" + row.user_id + "' data-target-uid2='" + row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button>" +
            "</div></td>";
          // trNurse += "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-view-btn' data-target-uid='" + row.form_id + "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" + "<button class='button is-small is-warning nurse-consultation-form' data-target-uid='" + row.user_id + "' data-target-uid2='" + row.form_id +"' type='button'><span class='icon'><i class='mdi mdi-pen'></i></span></button></div></td>";
          trNurse += "</tr>";
        }
      }

      // row.sess_nurse_id == row.nurse_id || row.consultation_status !== 'pending' && row.sess_nurse_id == 3
      if ((row.consultation_status == "approved" && row.sess_nurse_id == row.nurse_id) || (row.sess_nurse_id == 1 && row.consultation_status == "approved")) {
        var trhistoryNurse =
          "<tr data-target-section='" +
          row.section +
          "' data-target-grade='" +
          row.grade +
          "'>";
        trhistoryNurse +=
          '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        trhistoryNurse +=
          "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        trhistoryNurse +=
          "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        trhistoryNurse +=
          "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
          formatDate(row.date_created) +
          "</small></td>";
        trhistoryNurse +=
          "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
          formatDate(row.date_med) +
          "</small></td>";
        trhistoryNurse +=
          "<td data-label='status' class='status open'>" + row.status + "</td>";
        trhistoryNurse +=
          "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary nurse-med-view-btn' data-target-uid='" +
          row.form_id +
          "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
          "<button class='button is-small is-danger' type='button' onclick='delRecordAppointment(" + row.form_id + ")'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
        trhistoryNurse += "</tr>";

        var trMedicalRecord =
          "<tr data-target-section='" +
          row.section +
          "' data-target-grade='" +
          row.grade +
          "'>";
        trMedicalRecord +=
          '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
        trMedicalRecord +=
          "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
        trMedicalRecord +=
          "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
        trMedicalRecord += "<td data-label='Grade'>" + row.grade + "</td>";
        trMedicalRecord +=
          "<td data-label='parent_name'>" + paentGuardian + "</td>";
        trMedicalRecord += "<td data-label='section'>" + row.section + "</td>";
        //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
        trMedicalRecord +=
          "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
          formatDate(row.date_created) +
          "</small></td>";
        trMedicalRecord +=
          "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
          formatDate(row.date_med) +
          "</small></td>";
        // trMedicalRecord += "<td data-label='status'>" + row.status + "</td>";
        trMedicalRecord +=
          "<td class='is-actions-cell'><div class='buttons is-left'><button class='button is-small is-primary view-medical-certificate' data-target-muid='" +
          row.form_id +
          "' type='button'><span class='icon'><i class='mdi mdi-eye'></i></span></button>" +
          "<button class='button is-small is-danger' type='button' onclick='delRecordAppointment(" + row.form_id + ")'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
        trMedicalRecord += "</tr>";
      }

      $("#nurseTable").append(trNurse);
      $("#nurseHistoryTable").append(trhistoryNurse);
      $("#nurseMedicalRecord").append(trMedicalRecord);
    });
    $(".view-medical-certificate").click(function () {
      var uid = $(this).data("target-muid");
      $("#view-med-record").addClass("is-active");
      $("section").hide();
      $.ajax({
        url: "backend/get-specific-medical-record.php",
        type: "GET",
        dataType: "json",
        data: {
          uid: uid,
        },
        success: function (response) {
          var data = response.data.medical_cert;
          // console.log(data);
          $("#student-name").html(
            capitalizeFirstLetter(response.data.first_name) +
              " " +
              capitalizeFirstLetter(response.data.last_name)
          );
          $("#student-date-med").html(formatDate(response.data.date_med));
          $("#student-findings").html(data.findings);
          $("#student-reasons").html(data.reasons);
          $("#student-medication").html(data.medication);
          $("#student-quantity").html(data.quantity);
          $("#student-special-treatment").html(data.special_treatment);
          $(".download-cert").attr("data-target-uid", data.id);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    });

    // View button nurse-table
    $(".nurse-view-btn").click(function () {
      $(".section").hide();

      $("#nurse-view-med-form").addClass("is-active");
      var uid = $(this).data("target-uid");
      // console.log(uid);
      $.ajax({
        url: "backend/get-specific-med-history.php",
        type: "GET",
        dataType: "json",
        data: {
          uid: uid,
        },
        success: function (response) {
          var object = response[0];
          // console.log(object);
          $("#heading-name").html(
            "Name of Patient: " +
              capitalizeFirstLetter(object.first_name) +
              " " +
              capitalizeFirstLetter(object.last_name)
          );
          $("#heading-date").html(
            "Date Created: " + formatDate(object.date_created)
          );
          $("#heading-date1").html(
            "Date of Clinic: " + formatDate(object.date_med)
          );
          $("#heading-status").html("Status: " + object.status);
          // if(object.)
          // $('#attending-nurse').html('Date of Clinic: ' + object.status);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    });

    // View button nurse-history-table
    $(".nurse-med-view-btn").click(function () {
      $(".section").hide();
      $("#view-med-form").addClass("is-active");
      var uid = $(this).data("target-uid");
      // console.log(uid);
      $.ajax({
        url: "backend/get-specific-med-history.php",
        type: "GET",
        dataType: "json",
        data: {
          uid: uid,
        },
        success: function (response) {
          var object = response[0];
          // console.log(object);
          $("#heading-name").html(
            "Name of Patient: " +
              capitalizeFirstLetter(object.first_name) +
              " " +
              capitalizeFirstLetter(object.last_name)
          );
          $("#heading-date").html(
            "Date Created: " + formatDate(object.date_created)
          );
          $("#heading-date1").html(
            "Date of Clinic: " + formatDate(object.date_med)
          );
          $("#heading-status").html("Status: " + object.status);
          $("#attending-nurse").html("Attending Nurse: " + object.nurse_name);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    });

    $(".nurse-consultation-form").click(function () {
      const studentID = $(this).data("target-uid");
      const formID = $(this).data("target-uid2");
      window.location.href =
        "./medical-certificate.php?student_id=" +
        studentID +
        "&form_id=" +
        formID;
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
    $(".nurse-edit-btn").click(function () {
      $("#nurse-edit-med-form").addClass("is-active");
      var uid = $(this).data("target-uid");
      $.ajax({
        url: "backend/get-specific-med-history.php",
        type: "GET",
        dataType: "json",
        data: {
          uid: uid,
        },
        success: function (response) {
          var object = response[0];
          //   console.log(object);
          $("#heading-name-edit").html(
            "Name of Patient: " +
              capitalizeFirstLetter(object.first_name) +
              " " +
              capitalizeFirstLetter(object.last_name)
          );
          //   $('#heading-status-edit').val(object.status);
          $("#update-form-btn").attr("data-target-form-id", object.form_id);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    });
  }
  function renderPagination(totalPages, currentPage) {
    const paginationButtons = document.getElementById("paginationButtonsTable");
    paginationButtons.innerHTML = "";
    for (let i = 1; i <= totalPages; i++) {
      const button = document.createElement("button");
      button.classList.add("button");
      button.textContent = i;
      if (i === currentPage) {
        button.classList.add("is-current");
      }
      paginationButtons.appendChild(button);
      button.onclick = function () {
        // alert(i);
        refreshTable(i, 10);
      };
    }
  }

  function formatDate(date) {
    var timestamp = new Date(date);
    var month = timestamp.toLocaleString("default", { month: "short" }); // Get 3-letter month name
    var day = timestamp.getDate(); // Get the day
    var year = timestamp.getFullYear(); // Get the year
    var formattedDate = month + " " + day + ", " + year;
    return formattedDate;
  }
  function setArchivedTable() {
    $.ajax({
      url: "backend/archived_clinic_app.php",
      method: "GET",
      dataType: "json",
      success: function (response) {
        $("#archivedTable").empty();
        // console.log(response); die();

        $.each(response, function (index, row) {
          var firstName =
            row.first_name.charAt(0).toUpperCase() +
            row.first_name.slice(1).toLowerCase();
          var lastName =
            row.last_name.charAt(0).toUpperCase() +
            row.last_name.slice(1).toLowerCase();
          var paentGuardian =
            row.parent_guardian.charAt(0).toUpperCase() +
            row.parent_guardian.slice(1).toLowerCase();

          var archvdData = "<tr>";
          archvdData +=
            '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
          archvdData +=
            "<td class='is-image-cell'><div class='image'><img src='' class='is-rounded'></div></td>";
          archvdData +=
            "<td data-label='Name'>" + firstName + " " + lastName + "</td>";
          archvdData += "<td data-label='Grade'>" + row.grade + "</td>";
          archvdData +=
            "<td data-label='parent_name'>" + paentGuardian + "</td>";
          archvdData += "<td data-label='section'>aw</td>";
          //   tr += "<td data-label='Progress' class='is-progress-cell'><progress max='100' class='progress is-small is-primary' value=''></progress></td>";
          archvdData +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_created) +
            "</small></td>";
          archvdData +=
            "<td data-label='Created'><small class='has-text-grey is-abbr-like' title='#'>" +
            formatDate(row.date_med) +
            "</small></td>";
          archvdData += "<td data-label='status'>" + row.status + "</td>";
          archvdData +=
            "<td class='is-actions-cell'><div class='buttons is-left'>" +
            "<button class='button is-small is-warning' type='button' onclick='restoreAppointment(" +
            row.form_id +
            ")'><span class='icon'><i class='mdi mdi-trash-can'></i></span></button></div></td>";
          archvdData += "</tr>";

          $("#archivedTable").append(archvdData);
        });
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  }
  $("#archived-appointments").click(function () {
    $("#nurseTable").attr("hidden", true);
    $("#archivedTable").removeAttr("hidden");
    $(".level-item ul li:eq(1)").text("Clinic Archived Appointments");
    $("h1.title").text("Clinic Archived Appointments");

    setArchivedTable();
  });
  // Update button
  $("#update-form-btn").click(function () {
    var form_id = $(this).data("target-form-id");
    var status = $("#heading-status-edit").val();
    // console.log(status);
    $.ajax({
      url: "backend/update-specific-med-form.php",
      type: "POST",
      data: {
        form_id: form_id,
        status: status,
      },
      beforeSend: function () {
        $("#loading-show").addClass("loading");
      },
      success: function (response) {
        $("#loading-show").removeClass("loading");
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
  // setInterval(refreshTable, 2000);
});
function restoreAppointment(formuid) {
  Swal.fire({
    icon: "success",
    title: "Appointment successfully restored!",
    showConfirmButton: false,
    timer: 1500,
  }).then(() => {
    $.ajax({
      url: "backend/restore-specific-med-form.php",
      type: "POST",
      data: {
        form_id: formuid,
      },
      success: function (response) {
        window.location.reload();
        // window.location.href = "nurse-table.php?status=pending";
        // $('#nurseTable').attr('hidden', true);
        // $('#archivedTable').removeAttr("hidden");
        // $(".level-item ul li:eq(1)").text("Clinic Archived Appointments");
        // $("h1.title").text("Clinic Archived Appointments");
        // setArchivedTable();
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
}
function delRecordAppointment(formuid){
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, archive it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "backend/delete-specific-consultation-form.php",
        type: "POST",
        data: {
          form_id: formuid,
        },
        success: function (response) {
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been archived.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            window.location.reload();
          });
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    }
  });
}

function deleteAppointment(formuid) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, archive it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "backend/delete-specific-med-form.php",
        type: "POST",
        data: {
          form_id: formuid,
        },
        success: function (response) {
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been archived.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => {
            window.location.reload();
          });
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        },
      });
    }
  });
}

// History Table Filter
$("#dateFilterHistory").on("change", function () {
  var selectedDate = $(this).val();
  $("#historyToDownload tbody tr").each(function () {
    var rowDate = $(this).find("td:nth-child(4)").text().trim();
    if (rowDate === selectedDate || selectedDate === "") {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
});
$("#sectionFilterHistory").on("change", function () {
  var selectedSection = $(this).val();
  // console.log(selectedSection);

  if (selectedSection === "") {
    // Show all rows if "All Sections" is selected
    $("#nurseHistoryTable tr").show();
  } else {
    // Show only the rows that match the selected section
    $("#nurseHistoryTable tr").each(function () {
      var rowSection = $(this).data("target-section");
      if (rowSection === selectedSection) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});
$("#gradeFilterHistory").on("change", function () {
  var selectedGrade = $(this).val();
  // console.log(selectedSection);
  let number = selectedGrade.match(/\d+/)[0];

  $.ajax({
    url: "backend/get-section.php",
    type: "POST",
    data: {
      grade_level: $(this).val(),
    },
    success: function (response) {
      // $('#section')
      let select = $("#sectionFilterHistory");
      select.empty();
      select.append("<option selected hidden>Section</option>");
      var data = JSON.parse(response);

      $.each(data, function (key, value) {
        select.append(
          '<option value="' +
            value.section_name +
            '">' +
            value.section_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.log(error);
    },
  });

  if (selectedGrade === "") {
    $("#nurseHistoryTable tr").show();
  } else {
    $("#nurseHistoryTable tr").each(function () {
      var rowGrade = $(this).data("target-grade");
      if (rowGrade === selectedGrade) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});
$("#downloadPdfHistory").click(function () {
  downloadPDFHistory();
});

function downloadPDFHistory() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Get table headers
  const headers = [];
  $("#historyToDownload thead th").each(function (index) {
    // Skip the last column (Action)
    if (index < $("#historyToDownload thead th").length - 1) {
      headers.push($(this).text().trim());
    }
  });

  // Get visible table rows
  const data = [];
  $("#historyToDownload tbody tr:visible").each(function () {
    const row = [];
    $(this)
      .find("td")
      .each(function (index) {
        // Skip the last column (Action)
        if (index < $(this).parent().find("td").length - 1) {
          row.push($(this).text().trim());
        }
      });
    data.push(row);
  });

  // Add headers and data to the PDF
  doc.autoTable({
    head: [headers],
    body: data,
  });

  // Save the PDF
  doc.save("Clinic Medical History.pdf");
}
// End of filter

// Record Table Filter
$("#sectionFilterRecord").on("change", function () {
  var selectedSection = $(this).val();
  // console.log(selectedSection);

  if (selectedSection === "") {
    // Show all rows if "All Sections" is selected
    $("#nurseMedicalRecord tr").show();
  } else {
    // Show only the rows that match the selected section
    $("#nurseMedicalRecord tr").each(function () {
      var rowSection = $(this).data("target-section");
      if (rowSection === selectedSection) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});
$("#gradeFilterRecord").on("change", function () {
  var selectedGrade = $(this).val();
  // console.log(selectedSection);
  let number = selectedGrade.match(/\d+/)[0];

  $.ajax({
    url: "backend/get-section.php",
    type: "POST",
    data: {
      grade_level: $(this).val(),
    },
    success: function (response) {
      // $('#section')
      let select = $("#sectionFilterRecord");
      select.empty();
      select.append("<option selected hidden>Section</option>");
      var data = JSON.parse(response);

      $.each(data, function (key, value) {
        select.append(
          '<option value="' +
            value.section_name +
            '">' +
            value.section_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.log(error);
    },
  });

  if (selectedGrade === "") {
    $("#nurseMedicalRecord tr").show();
  } else {
    $("#nurseMedicalRecord tr").each(function () {
      var rowGrade = $(this).data("target-grade");
      if (rowGrade === selectedGrade) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});
$("#downloadPdfRecord").click(function () {
  downloadPDFRecord();
});

function downloadPDFRecord() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Get table headers
  const headers = [];
  $("#recordToDownload thead th").each(function (index) {
    // Skip the last column (Action)
    if (index < $("#recordToDownload thead th").length - 1) {
      headers.push($(this).text().trim());
    }
  });

  // Get visible table rows
  const data = [];
  $("#recordToDownload tbody tr:visible").each(function () {
    const row = [];
    $(this)
      .find("td")
      .each(function (index) {
        // Skip the last column (Action)
        if (index < $(this).parent().find("td").length - 1) {
          row.push($(this).text().trim());
        }
      });
    data.push(row);
  });

  // Add headers and data to the PDF
  doc.autoTable({
    head: [headers],
    body: data,
  });

  // Save the PDF
  doc.save("Clinic Medical Record.pdf");
}
//End of filter

$(".download-cert").click(function () {
  var form_id = $(this).data("target-uid");
  var url = "backend/medical-history.php?form_id=" + form_id;
  var contentWindow = window.open(url, "_blank");
  contentWindow.onload = function () {
    contentWindow.postMessage("generatePdf", "*");
  };
});

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
