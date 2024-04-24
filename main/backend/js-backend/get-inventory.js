inventoryTable(1, 10);

function inventoryTable(page, limit) {
  $.ajax({
    url: "backend/get-medical-inventory.php",
    type: "GET",
    dataType: "json",
    data: { page: page, limit: limit },
    success: function (response) {
      $("#dataTable-inventory").empty();
      $.each(response, function (index, item) {
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
          item.date_created +
          "</small></td>";
        tr +=
          '<td data-label="Created">' +
          '<small class="has-text-grey is-abbr-like" title="DateCreated">' +
          item.date_updated +
          "</small></td>";
        tr +=
          '<td class="is-actions-cell">' +
          '<div class="buttons is-right">' +
          '<button class="button is-small is-primary" type="button">' +
          '<span class="icon"><i class="mdi mdi-eye"></i></span>' +
          "</button>" +
          '<button class="button is-small is-danger" type="button">' +
          '<span class="icon"><i class="mdi mdi-trash-can"></i></span>' +
          "</button></div></td>";

        $("#dataTable-inventory").append(tr);
      });

    },
  });
}
