inventoryTable(1, 10);
var allInventoryData = [];
var totalPages;
function inventoryTable(page, limit) {
  $.ajax({
    url: "backend/get-medical-inventory.php",
    type: "GET",
    dataType: "json",
    data: { page: page, limit: limit },
    success: function (response) {
      allInventoryData = response.allData;
      paginatedData = response.data;
      renderTable(paginatedData.slice(0, limit));
      totalPages = response.totalPages;
      renderPagination(totalPages);
      updatePaginationStatus(page, totalPages);
    },
  });
}

function renderTable(data) {
  $("#dataTable-inventory").empty();

  $.each(data, function (index, item) {
    var tr = "<tr>";
    // tr +=
    //   '<td class="is-checkbox-cell"><label class="b-checkbox checkbox">' +
    //   '<input type="checkbox" value="false">' +
    //   '<span class="check"></span></label></td>';
    tr +=
      '<td class="is-image-cell"></td>';
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
      formatDate(item.date_expiry) +
      "</small></td>";
    // tr +=
    //   '<td data-label="Created">' +
    //   '<small class="has-text-grey is-abbr-like" title="DateCreated">' +
    //   (item.date_updated == '0000-00-00 00:00:00' ? 'Not Updated Yet!' : formatDate(item.date_updated)) +
    //   "</small></td>";
    tr +=
      '<td class="is-actions-cell">' +
      '<div class="buttons is-left">' +
      '<button class="button is-small is-primary edit-inventory" id="edit-med-item" data-target-item-id="' +
      item.id +
      '" data-target-item-quantity="' +
      item.quantity +
      '" type="button">' +
      '<span class="icon"><i class="mdi mdi-pen"></i></span>' +
      "</button>" +
      '<button class="button is-small is-danger" type="button" onclick="delInventory('+item.id+')">' +
      '<span class="icon"><i class="mdi mdi-trash-can"></i></span>' +
      "</button></div></td>";

    $("#dataTable-inventory").append(tr);

    $(".edit-inventory").click(function () {
      const modal = document.getElementById("modal1");
      modal.style.display = "block";

      const itemId = $(this).data("target-item-id");
      const itemQuantity = $(this).data("target-item-quantity");
      $("#id_item").val(itemId);
      $("#quantity_item").val(itemQuantity);
    });
  });
}

$("#updateItem").submit(function () {
  var updateItem = $("#updateItem").serialize();
  $.ajax({
    url: "backend/edit-med-item.php",
    type: "POST",
    data: updateItem,
    success: function (response) {
      console.log(response);
    },
  });
});
function searchTable() {
  var search = $("#searchInput").val().toLowerCase();

  if (search.trim() === "") {
    inventoryTable(1, 10); 
  } else {
    var filteredData = allInventoryData.filter(function(item) {
      var id = item.item_id.toLowerCase();
      var name = item.name.toLowerCase();
      return id.indexOf(search) > -1 || name.startsWith(search);
    });
    renderTable(filteredData);
  }
}
function delInventory(itemID) {
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
        url: "backend/del-med-item.php",
        type: "POST",
        data: { id: itemID },
        success: function (response) {
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been archived.",
            icon: "success",
          }).then(() => {
            inventoryTable(1, 10); 
          });;
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
        }
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
  const modal = document.getElementById("modal");
  modal.style.display = "block";

  var randomUID = Math.floor(1000000 + Math.random() * 9000000).toString();
  var formattedId = randomUID.slice(0, 3) + '-' + randomUID.slice(3, 6) + '-' + randomUID.slice(6);
  $('#item_uid').val(formattedId);

}

function closeModal() {
  const modal = document.getElementById("modal");
  modal.style.display = "none";
}

function openModal1() {

}

function closeModal1() {
  const modal = document.getElementById("modal1");
  modal.style.display = "none";
}

function renderPagination(totalPages, currentPage) {
  const paginationButtons = document.getElementById("paginationButtons");
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
      inventoryTable(i, 10);
    };
  }
}

function updatePaginationStatus(currentPage, totalPages) {
  const paginationStatus = document.getElementById("paginationStatus");
  paginationStatus.innerHTML = `<small>Page ${currentPage} of ${totalPages}</small>`;
}

$("#add_inventory").submit(function () {
  const forms = $(this).serialize();

  $.ajax({
    url: "backend/add-inventory.php",
    type: "POST",
    data: forms,
    success: function (response) {
      console.log(response);
    },
  });
});
