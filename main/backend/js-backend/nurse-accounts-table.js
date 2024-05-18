$(function() {
   nurseAccount();
   
   function nurseAccount() {
     $.ajax({
        url: 'backend/get-nurse-accounts.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $("#nurseAccounts").empty();

            $.each(response, function(index, item) {
                var tr = "<tr>";
                tr += '<td class="is-checkbox-cell"><label class="b-checkbox checkbox"><input type="checkbox" class="selectRow"><span class="check"></span></label></td>';
                tr += '<td class="is-image-cell"><div class="image"><img src="https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg"class="is-rounded"></div></td>';
                tr += '<td data-label="UserID">' + item.user_id + '</td>';
                tr += '<td data-label="Name">' + item.first_name + ' ' + item.last_name + '</td>';
                tr += '<td data-label="Email">' + item.email + '</td>';
                tr += '<td data-label="Date"><small class="has-text-grey is-abbr-like"">' + item.date_created + '</small></td>';
                tr += '<td data-label="status">' + item.status + '</td>';
                tr += '<td class="is-actions-cell"><div class="buttons is-left">'
                + '<button class="button is-small is-primary view-edit-nurse-status" data-target-uid="' + item.user_id +'" type="button"><span class="icon"><i class="mdi mdi-pen"></i></span></button>'
                + '<button class="button is-small is-danger" type="button" onclick="deleteData()"><span class="icon"><i class="mdi mdi-trash-can"></i></span></button></div></td>';
                tr += "</tr>";
                $("#nurseAccounts").append(tr);
            });

            $('.view-edit-nurse-status').click(function() {
              $('#vd-nurse-status').addClass('is-active');
                const uid = $(this).data('target-uid');
                // console.log(uid);

                $.ajax({
                  url: 'backend/get-nurse-status.php',
                  type: 'GET',
                  data: { uid: uid },
                  success: function(response) {
                    var data = JSON.parse(response);
                    // console.log(data.nurse_name);
                    $('#status_nurse_name').html(data.nurse_name);

                    $('#aptupdate').click(function (){
                      var status = $('#status_nurse_edit').val();
                      
                      $.ajax({
                        url: 'backend/edit-nurse-status.php',
                        type: 'POST',
                        data: { uid: uid, status: status },
                        success: function(response) {
                          console.log(response);
                        }
                      });
                    });
                  },
                  error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                  }
                })
             });
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
     }); 
     
   };

   $('#addnursebtn').click(function() {
    $('#addnursemodal').addClass('is-active');
    $('#submitnursebtn').click(function() {
      const forms = $('#add_nurse').serialize();
      $.ajax({
        url: 'backend/add-nurse.php',
        type: 'POST',
        data: forms,
        success: function(response) {
          console.log(response);
          // $('#addnursemodal').removeClass('is-active');
          // $('#nurseAccounts').empty();
          // nurseAccount();
        }
      })
    })
  });
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