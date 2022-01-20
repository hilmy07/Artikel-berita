$(document).ready(function () {
  $("#search").keyup(function () {
    searchKategori($(this).val());
  });
  function searchKategori(value) {
    $("#card-container .card").each(function () {
      var found = "false";
      $(this).each(function () {
        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
          found = "true";
        }
      });
      if (found == "true") {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});

