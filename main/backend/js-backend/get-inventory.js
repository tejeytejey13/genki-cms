inventoryTable(1, 10);

function inventoryTable(page, limit) {
  $.ajax({
    url: "backend/get-medical-inventory.php",
    type: "GET",
    dataType: "json",
    data: { page: page, limit: limit },
    success: function (response) {
      $("#dataTable-inventory").empty();
      
      $.each(response.data, function (index, item) {
        var tr = "<tr>";
        tr +=
          '<td class="is-checkbox-cell"><label class="b-checkbox checkbox">' +
          '<input type="checkbox" value="false">' +
          '<span class="check"></span></label></td>';
        tr +=
          '<td class="is-image-cell"><div class="image">' +
          '<img src="https://avatars.dicebear.com/v2/initials/lonzo-steuber.svg"class="is-rounded">' +
          "</div></td>";
        tr += '<td data-label="ItemId">' + item.item_id + "</td>";
        tr += '<td data-label="Name">' + item.name + "</td>";
        tr += '<td data-label="Quantity">' + item.quantity + "</td>";
        tr +=
          '<td data-label="Created">' +
          '<small class="has-text-grey is-abbr-like" title="DateCreated">' +
          formatDate(item.date_created) +
          "</small></td>";
        tr +=
          '<td data-label="Created">' +
          '<small class="has-text-grey is-abbr-like" title="DateCreated">' +
          formatDate(item.date_updated) +
          "</small></td>";
        tr +=
          '<td class="is-actions-cell">' +
          '<div class="buttons is-right">' +
          '<button class="button is-small is-primary edit-inventory" id="edit-med-item" data-target-item-id="'+item.item_id+'" data-target-item-quantity="'+item.quantity+'" type="button"' +
          '<span class="icon"><i class="mdi mdi-eye"></i></span>' +
          "</button>" +
          '<button class="button is-small is-danger" type="button" onclick="deleteData()">' +
          '<span class="icon"><i class="mdi mdi-trash-can"></i></span>' +
          "</button></div></td>";

        $("#dataTable-inventory").append(tr);

        $('.edit-inventory').click(function() {
          const modal = document.getElementById('modal1');
          modal.style.display = 'block';

          const itemId = $(this).data('target-item-id');
          const itemQuantity = $(this).data('target-item-quantity');
          $('#id_item').val(itemId);
          $('#quantity_item').val(itemQuantity);
          
          
        });
      });
      const totalPages = response.totalPages;
      renderPagination(totalPages);
      updatePaginationStatus(page, totalPages);
    },
  });
}

$('.save-med-item').click(function() {
  var updateItem = $('#updateItem').serialize();
  $.ajax({
    url: "backend/edit-med-item.php",
    type: "POST",
    data: updateItem,
    success: function (response) {
      console.log(response);
    }
    
  })
});
function searchTable(){
  var search = $("#searchInput").val().toLowerCase(); 
    
    $("#dataTable-inventory tr").each(function() {
        var id = $(this).find("td:eq(2)").text().toLowerCase(); 
        var name = $(this).find("td:eq(3)").text().toLowerCase(); 
        
        if (id.indexOf(search) > -1 || name.indexOf(search) > -1) {
            $(this).show(); 
        } else {
            $(this).hide();
        }
    });
  
}
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

function formatDate(date) {
  var timestamp = new Date(date);
  var month = timestamp.toLocaleString("default", { month: "short" }); // Get 3-letter month name
  var day = timestamp.getDate(); // Get the day
  var year = timestamp.getFullYear(); // Get the year
  var formattedDate = month + " " + day + ", " + year;
  return formattedDate;
}

function openModal() {
  const modal = document.getElementById('modal');
  modal.style.display = 'block';
  
}

function closeModal() {
  const modal = document.getElementById('modal');
  modal.style.display = 'none';
}

function openModal1() {
  
}

function closeModal1() {
  const modal = document.getElementById('modal1');
  modal.style.display = 'none';
}

function renderPagination(totalPages) {
  const paginationButtons = document.getElementById("paginationButtons");
  paginationButtons.innerHTML = "";
  for (let i = 1; i <= totalPages; i++) {
      const button = document.createElement("button");
      button.classList.add("button");
      button.textContent = i;
      button.onclick = function() {
          inventoryTable(i, 10); 
      };
      paginationButtons.appendChild(button);
  }
}

function updatePaginationStatus(currentPage, totalPages) {
  const paginationStatus = document.getElementById("paginationStatus");
  paginationStatus.innerHTML = `<small>Page ${currentPage} of ${totalPages}</small>`;
}