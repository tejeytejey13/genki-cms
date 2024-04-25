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
                + '<button class="button is-small is-primary" type="button" ><span class="icon"><i class="mdi mdi-pen"></i></span></button>'
                + '<button class="button is-small is-danger" type="button" onclick="deleteData()"><span class="icon"><i class="mdi mdi-trash-can"></i></span></button></div></td>';
                tr += "</tr>";
                $("#nurseAccounts").append(tr);
            });


        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
     }); 
   };

   $('#addnursebtn').click(function() {
    $('#addnursemodal').addClass('is-active');
    const forms = $('#add_nurse').serialize();
    // $.ajax({
    //   url: 'backend/add-nurse.php',
    //   type: 'POST',
    //   data: forms,
    //   success: function(response) {
    //     console.log(response);
    //     // $('#addnursemodal').removeClass('is-active');
    //     // $('#nurseAccounts').empty();
    //     // nurseAccount();
    //   }
    // })
   });
});

function deleteData(){
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        });
      }
    });
  }