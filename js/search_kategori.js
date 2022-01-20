$(".category_container").click(function () {
  var cek = document.querySelectorAll(".category_item");
  // console.log($(".category_item"));

  $(".category_item").click(function () {
    var category = $(this).attr("id");
    // console.log(category);
    if (category == "all") {
      $(".kategori_item").addClass("hide");
      setTimeout(function () {
        $(".kategori_item").removeClass("hide");
        // console.log("all");
      }, 300);
    } else {
      $(".kategori_item").addClass("hide");
      setTimeout(function () {
        // console.log(category);
        $("." + category).removeClass("hide");
        // console.log("no all");
      }, 300);
    }
  });
});


